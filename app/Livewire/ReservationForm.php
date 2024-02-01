<?php

namespace App\Livewire;

use App\Models\File;
use App\Models\Zone;
use App\Models\Topic;
use App\Models\Ticket;
use Livewire\Component;
use App\Mail\SendTicket;
use App\Models\Participant;
use App\Models\Reservation;
use Illuminate\Support\Str;
use Livewire\Attributes\Url;
use Livewire\WithFileUploads;
use App\Mail\SendTicketBilateral;
use App\Models\HospitalityContact;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

class ReservationForm extends Component
{
    use WithFileUploads;

    #[Url]
    public $token = '';
    public $validated = true;

    public $isSuccess = false;
    public $isJoin = 0;
    public $participant_id = '';
    public $isHospitalitySame = false;
    public $selectHospitalityParticipant = 1;

    public $currentStep = 1;

    public $firstName, $lastName, $email, $phone, $company, $jobTitle, $hasAccompany = 0, $selectParticipant = 1;

    public $accompanyFirstName = '', $accompanyLastName = '', $accompanyEmail, $accompanyPhone, $accompanyCompany, $accompanyJobTitle;

    public $hospitalityFirstName = '', $hospitalityLastName = '', $hospitalityEmail, $hospitalityPhone;

    public $isMedia = 1, $isComing = 0, $isPotential, $projectFootprint, $topic = [], $attachment = [], $note = '';

    public function firstStepSubmit()
    {
        if ($this->validated) {
            $this->validate([
                'isMedia' => 'required',
                'company' => 'required',
                'jobTitle' => 'required',
                'firstName' => 'required',
                'lastName' => 'required',
                'email' => 'required|email|unique:participants,email',
                'phone' => 'required',
                'isComing' => 'required'
            ], [
                'isComing.required' => 'Are you coming or not?'
            ]);

            if ($this->hasAccompany) {
                $this->validate([
                    'accompanyCompany' => 'required',
                    'accompanyJobTitle' => 'required',
                    'accompanyFirstName' => 'required',
                    'accompanyLastName' => 'required',
                    'accompanyEmail' => 'required|email|unique:participants,email',
                    'accompanyPhone' => 'required|unique:participants,phone',
                ]);
            }
        }

        if ($this->isComing != 0 && $this->isMedia != 1) {
            $this->currentStep = 2;
        } else {
            $this->currentStep = 4;
        }
    }

    public function secondStepSubmit()
    {
        if ($this->validated) {
            if ($this->isJoin) {
                $this->validate([
                    'isJoin' => 'required',
                    'topic' => 'required',
                    'isPotential' => 'required',
                    'projectFootprint' => 'required',
                ]);
            }
        }

        $this->currentStep = 3;
    }

    public function thirdStepSubmit()
    {
        if ($this->validated) {
            if ($this->isHospitalitySame) {
                if ($this->selectHospitalityParticipant == 1) {
                    $this->hospitalityFirstName = $this->firstName;
                    $this->hospitalityLastName = $this->lastName;
                    $this->hospitalityEmail = $this->email;
                    $this->hospitalityPhone = $this->phone;
                } else {
                    $this->hospitalityFirstName = $this->accompanyFirstName;
                    $this->hospitalityLastName = $this->accompanyLastName;
                    $this->hospitalityEmail = $this->accompanyEmailName;
                    $this->hospitalityPhone = $this->accompanyPhoneName;
                }
            } else {
                $this->validate([
                    'hospitalityFirstName' => 'required',
                    'hospitalityLastName' => 'required',
                    'hospitalityEmail' => 'required',
                    'hospitalityPhone' => 'required'
                ]);
            }
        }

        $this->currentStep = 4;
    }

    public function submit()
    {

        if ($this->isMedia == 1) {
            $reservation = Reservation::create([
                'isJoin' => 0,

            ]);

            $participant = Participant::create([
                'isMedia' => $this->isMedia,
                'reservation_id' => $reservation->id,
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'email' => $this->email,
                'phone' => $this->phone,
                'company' => $this->company,
                'jobTitle' => $this->jobTitle,
                'isComing' => $this->isComing,
            ]);

            if ($participant->isComing == 1) {
                $participantTicket = new Ticket();
                $participantTicket->code = Str::random(15);
                $participantTicket->participant_id = $participant->id;
                $participantTicket->isPlenary = 0;
                $participantTicket->save();

                $zone = Zone::create([
                    'ticket_id' => $participantTicket->id,
                    'isExhibition' => 1,
                    'isPlenary' => 0,
                    'isBilateral' => 0,
                    'isGala' => 0
                ]);

                Mail::to($participant->email)->send(new SendTicket($participant->firstName, $participantTicket->code));
            }


            if ($this->hasAccompany == 1) {
                $accompany = Participant::create([
                    'isMedia' => $this->isMedia,
                    'reservation_id' => $reservation->id,
                    'firstName' => $this->accompanyFirstName,
                    'lastName' => $this->accompanyLastName,
                    'email' => $this->accompanyEmail,
                    'phone' => $this->accompanyPhone,
                    'company' => $this->company,
                    'jobTitle' => $this->accompanyJobTitle,
                    'isComing' => $this->isComing,
                ]);

                $participantTicket = new Ticket();
                $participantTicket->code = Str::random(15);
                $participantTicket->participant_id = $accompany->id;
                $participantTicket->isPlenary = 0;
                $participantTicket->save();

                $zone = Zone::create([
                    'ticket_id' => $participantTicket->id,
                    'isExhibition' => 1,
                    'isPlenary' => 0,
                    'isBilateral' => 0,
                    'isGala' => 0
                ]);

                Mail::to($accompany->email)->send(new SendTicket($accompany->firstName, $participantTicket->code));
            };
        } else {
            if ($this->isJoin == 1) {
                $reservation = Reservation::create([
                    'isJoin' => $this->isJoin,
                    'isPotential' => $this->isPotential,
                    'projectFootprint' => $this->projectFootprint,
                    'note' => $this->note
                ]);
                foreach ($this->topic as $topics) {
                    Topic::create([
                        'reservation_id' => $reservation->id,
                        'name' => $topics
                    ]);
                }
                foreach ($this->attachment as $attachment) {
                    $fileName = $attachment->getClientOriginalName();
                    $attachment->storePubliclyAs('attachment/' . $this->company, $fileName, 'public');
                    File::create([
                        'reservation_id' => $reservation->id,
                        'path' => 'attachment/' . $fileName,
                    ]);
                }
            } else {
                $reservation = Reservation::create([
                    'isJoin' => 0,
                ]);
            }

            if ($this->isComing == 1) {
                if ($this->isHospitalitySame) {
                    if ($this->selectHospitalityParticipant == 1) {
                        HospitalityContact::create([
                            'reservation_id' => $reservation->id,
                            'firstName' => $this->firstName,
                            'lastName' => $this->lastName,
                            'email' => $this->email,
                            'phone' => $this->phone,
                        ]);
                    } else {
                        HospitalityContact::create([
                            'reservation_id' => $reservation->id,
                            'firstName' => $this->accompanyFirstName,
                            'lastName' => $this->accompanyLastName,
                            'email' => $this->accompanyEmail,
                            'phone' => $this->accompanyPhone,
                        ]);
                    }
                } else {
                    HospitalityContact::create([
                        'reservation_id' => $reservation->id,
                        'firstName' => $this->hospitalityFirstName,
                        'lastName' => $this->hospitalityLastName,
                        'email' => $this->hospitalityEmail,
                        'phone' => $this->hospitalityPhone,
                    ]);
                }
            }

            $participant = Participant::create([
                'isMedia' => $this->isMedia,
                'reservation_id' => $reservation->id,
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'email' => $this->email,
                'phone' => $this->phone,
                'company' => $this->company,
                'jobTitle' => $this->jobTitle,
                'isComing' => $this->isComing,
            ]);

            if ($participant->isComing == 1) {
                $participantTicket = new Ticket();
                $participantTicket->code = Str::random(15);
                $participantTicket->participant_id = $participant->id;
                // if ($this->selectParticipant == 1) {
                //     $participantTicket->isPlenary = 1;
                // } else {
                //     $participantTicket->isPlenary = 0;
                // }
                $participantTicket->isPlenary = 1;
                $participantTicket->save();

                $zone = Zone::create([
                    'ticket_id' => $participantTicket->id,
                    'isExhibition' => 1,
                    'isPlenary' => 1,
                    'isBilateral' => 0,
                    'isGala' => 0
                ]);

                if ($this->isJoin == 0) {
                    Mail::to($participant->email)->send(new SendTicket($participant->firstName, $participantTicket->code));
                } else {
                    Mail::to($participant->email)->send(new SendTicketBilateral($participant->firstName, $participantTicket->code));
                }
            }


            if ($this->hasAccompany == 1) {
                $accompany = Participant::create([
                    'isMedia' => $this->isMedia,
                    'reservation_id' => $reservation->id,
                    'firstName' => $this->accompanyFirstName,
                    'lastName' => $this->accompanyLastName,
                    'email' => $this->accompanyEmail,
                    'phone' => $this->accompanyPhone,
                    'company' => $this->company,
                    'jobTitle' => $this->accompanyJobTitle,
                    'isComing' => $this->isComing,
                ]);

                $participantTicket = new Ticket();
                $participantTicket->code = Str::random(15);
                $participantTicket->participant_id = $accompany->id;
                // if ($this->selectParticipant == 0) {
                //     $participantTicket->isPlenary = 1;
                // } else {
                //     $participantTicket->isPlenary = 0;
                // }
                $participantTicket->isPlenary = 1;
                $participantTicket->save();

                $zone = Zone::create([
                    'ticket_id' => $participantTicket->id,
                    'isExhibition' => 1,
                    'isPlenary' => 1,
                    'isBilateral' => 0,
                    'isGala' => 0
                ]);

                if ($this->isJoin == 0) {
                    Mail::to($participant->email)->send(new SendTicket($participant->firstName, $participantTicket->code));
                } else {
                    Mail::to($participant->email)->send(new SendTicketBilateral($participant->firstName, $participantTicket->code));
                }
            };
        }

        $this->isSuccess = true;
        $this->currentStep = 1;
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }

    public function render()
    {
        return view('livewire.reservation-form');
    }
}
