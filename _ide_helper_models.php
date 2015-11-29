<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Country
 *
 * @property integer $id
 * @property string $title
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereName($value)
 * @property string $iso2
 * @property string $short_name
 * @property string $long_name
 * @property string $iso3
 * @property string $numcode
 * @property string $un_member
 * @property string $calling_code
 * @property string $cctld
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Participant[] $participant
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereIso2($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereShortName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereLongName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereIso3($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereNumcode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereUnMember($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereCallingCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereCctld($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Country whereUpdatedAt($value)
 */
	class Country {}
}

namespace App{
/**
 * App\Eat
 *
 * @property integer $participant_id
 * @property string $date
 * @property integer $event_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Event $event
 * @property-read \App\Participant $participant
 * @method static \Illuminate\Database\Query\Builder|\App\Eat whereParticipantId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Eat whereDate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Eat whereEventId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Eat whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Eat whereUpdatedAt($value)
 */
	class Eat {}
}

namespace App{
/**
 * App\Event
 *
 * @property integer $id
 * @property string $title
 * @property string $logo
 * @property \Carbon\Carbon $begindate
 * @property \Carbon\Carbon $enddate
 * @property string $address
 * @property string $mailcontact
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Participant[] $participant
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereLogo($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereBegindate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereEnddate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereMailcontact($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereSelected($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereUpdatedAt($value)
 * @property boolean $selected
 * @property boolean $isactive
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\EventPicture[] $eventPicture
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eat[] $eat
 * @method static \Illuminate\Database\Query\Builder|\App\Event whereIsactive($value)
 */
	class Event {}
}

namespace App{
/**
 * App\EventPicture
 *
 * @property integer $id
 * @property integer $event_id
 * @property string $picture
 * @property boolean $isprincipal
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Event $event
 * @method static \Illuminate\Database\Query\Builder|\App\EventPicture whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EventPicture whereEventId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EventPicture wherePicture($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EventPicture whereIsprincipal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EventPicture whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\EventPicture whereUpdatedAt($value)
 */
	class EventPicture {}
}

namespace App{
/**
 * App\Event_Participant
 *
 * @property integer $participant_id
 * @property integer $event_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Event_Participant whereParticipantId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event_Participant whereEventId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event_Participant whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Event_Participant whereUpdatedAt($value)
 */
	class Event_Participant {}
}

namespace App{
/**
 * App\Expertise
 *
 * @property integer $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Participant[] $Participant
 * @method static \Illuminate\Database\Query\Builder|\App\Expertise whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Expertise whereName($value)
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Expertise whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Expertise whereUpdatedAt($value)
 */
	class Expertise {}
}

namespace App{
/**
 * App\Gender
 *
 * @property integer $id
 * @property string $name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Participant[] $Participant
 * @method static \Illuminate\Database\Query\Builder|\App\Gender whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Gender whereName($value)
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Gender whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Gender whereUpdatedAt($value)
 */
	class Gender {}
}

namespace App{
/**
 * App\Participant
 *
 * @property integer $id
 * @property string $email
 * @property integer $gender_id
 * @property string $lastname
 * @property string $firstname
 * @property integer $expertise_id
 * @property string $phonenumber
 * @property string $address
 * @property string $department
 * @property string $country
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Event[] $event
 * @property-read \App\Gender $gender
 * @property-read \App\Expertise $expertise
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereGenderId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereLastname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereFirstname($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereExpertiseId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant wherePhonenumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereAddress($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereDepartment($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereCountry($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereUpdatedAt($value)
 * @property integer $country_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Eat[] $eat
 * @method static \Illuminate\Database\Query\Builder|\App\Participant whereCountryId($value)
 */
	class Participant {}
}

namespace App{
/**
 * App\User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 */
	class User {}
}

