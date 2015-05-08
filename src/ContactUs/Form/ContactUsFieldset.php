<?php
namespace ContactUs\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Form\Element;
class ContactUsFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('contact-us');

        $this->setHydrator(new DoctrineHydrator($objectManager,'ContactUs\Entity\ContactUs'))->setObject(new \ContactUs\Entity\ContactUs());
		$this->objectManager = $objectManager;
		$this->add(array(
            'name' => 'id',
            'attributes' => array(
                'type'  => 'hidden',
            ),
        ));
		
		$this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'firstname',
			'attributes' => array(
				'autocomplete' => 'off',
				'class' => 'form-control',
				'required' => 'required',
			),
        ));
		
		$this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'lastname',
			'attributes' => array(
				'autocomplete' => 'off',
				'class' => 'form-control',
				'required' => 'required',
			),
        ));
		
		$select = new \Zend\Form\Element\Select('country');
		$select->setValueOptions(array(
				'AF' => 'Afghanistan',
				'AL' => 'Albania',
				'DZ' => 'Algeria',
				'AD' => 'Andorra',
				'AO' => 'Angola',
				'AI' => 'Anguilla',
				'AG' => 'Antigua',
				'AR' => 'Argentina',
				'AM' => 'Armenia',
				'AW' => 'Aruba',
				'AU' => 'Australia',
				'AT' => 'Austria',
				'AZ' => 'Azerbaijan',
				'BS' => 'Bahamas',
				'BH' => 'Bahrain',
				'BD' => 'Bangladesh',
				'BB' => 'Barbados',
				'BY' => 'Belarus',
				'BE' => 'Belgium',
				'BZ' => 'Belize',
				'BJ' => 'Benin',
				'BM' => 'Bermuda',
				'BT' => 'Bhutan',
				'BO' => 'Bolivia',
				'X1' => 'Bonaire',
				'BA' => 'Bosnia and Herzegovina',
				'BW' => 'Botswana',
				'BR' => 'Brazil',
				'BN' => 'Brunei',
				'BG' => 'Bulgaria',
				'BF' => 'Burkina Faso',
				'BI' => 'Burundi',
				'KH' => 'Cambodia',
				'CM' => 'Cameroon',
				'CA' => 'Canada',
				'X2' => 'Canary Islands',
				'CV' => 'Cape Verde',
				'KY' => 'Cayman Islands',
				'CF' => 'Central African Republic',
				'TD' => 'Chad',
				'CL' => 'Chile',
				'CN' => 'China',
				'CO' => 'Colombia',
				'KM' => 'Comoros Islands',
				'CG' => 'Congo',
				'CD' => 'Congo, Democratic Republic',
				'CK' => 'Cook Islands',
				'CR' => 'Costa Rica',
				'HR' => 'Croatia',
				'X4' => 'Curacao',
				'CY' => 'Cyprus',
				'CZ' => 'Czech Republic',
				'DK' => 'Denmark',
				'DJ' => 'Djibouti',
				'DM' => 'Dominica',
				'DO' => 'Dominican Republic',
				'TP' => 'East Timor',
				'EC' => 'Ecuador',
				'EG' => 'Egypt',
				'SV' => 'El Salvador',
				'GQ' => 'Equatorial Guinea',
				'ER' => 'Eritrea',
				'EE' => 'Estonia',
				'ET' => 'Ethiopia',
				'FK' => 'Falkland Islands',
				'FO' => 'Faroe Islands',
				'FJ' => 'Fiji Islands',
				'FI' => 'Finland',
				'FR' => 'France',
				'GF' => 'French Guiana',
				'GA' => 'Gabon',
				'GM' => 'Gambia',
				'GE' => 'Georgia',
				'DE' => 'Germany',
				'GH' => 'Ghana',
				'GI' => 'Gibraltar',
				'GR' => 'Greece',
				'GL' => 'Greenland',
				'GD' => 'Grenada',
				'GP' => 'Guadeloupe',
				'GU' => 'Guam',
				'GT' => 'Guatemala',
				'GG' => 'Guernsey',
				'GN' => 'Guinea',
				'GW' => 'Guinea-Bissau',
				'GY' => 'Guyana',
				'HT' => 'Haiti',
				'HN' => 'Honduras',
				'HK' => 'Hong Kong',
				'HU' => 'Hungary',
				'IS' => 'Iceland',
				'IN' => 'India',
				'ID' => 'Indonesia',
				'IE' => 'Ireland',
				'IL' => 'Israel',
				'IT' => 'Italy',
				'CI' => 'Ivory Coast',
				'JM' => 'Jamaica',
				'JP' => 'Japan',
				'JE' => 'Jersey',
				'JO' => 'Jordan',
				'KZ' => 'Kazakhstan',
				'KE' => 'Kenya',
				'KI' => 'Kiribati',
				'KR' => 'Korea, Republic of',
				'KW' => 'Kuwait',
				'KG' => 'Kyrgyzstan',
				'LA' => 'Laos',
				'LV' => 'Latvia',
				'LB' => 'Lebanon',
				'LS' => 'Lesotho',
				'LR' => 'Liberia',
				'LI' => 'Liechtenstein',
				'LT' => 'Lithuania',
				'LU' => 'Luxembourg',
				'MO' => 'Macau',
				'MK' => 'Macedonia',
				'MG' => 'Madagascar',
				'MW' => 'Malawi',
				'MY' => 'Malaysia',
				'MV' => 'Maldives',
				'ML' => 'Mali',
				'MT' => 'Malta',
				'MH' => 'Marshall Islands',
				'MQ' => 'Martinique',
				'MR' => 'Mauritania',
				'MU' => 'Mauritius',
				'YT' => 'Mayotte',
				'MX' => 'Mexico',
				'MD' => 'Moldova',
				'MC' => 'Monaco',
				'MN' => 'Mongolia',
				'MS' => 'Montserrat',
				'MA' => 'Morocco',
				'MZ' => 'Mozambique',
				'MM' => 'Myanmar (Burma)',
				'NA' => 'Namibia',
				'NR' => 'Nauru, Republic of',
				'NP' => 'Nepal',
				'NL' => 'Netherlands, The',
				'NK' => 'Nevis',
				'NC' => 'New Caledonia',
				'NZ' => 'New Zealand',
				'NI' => 'Nicaragua',
				'NE' => 'Niger',
				'NG' => 'Nigeria',
				'NU' => 'Niue Island',
				'NO' => 'Norway',
				'OM' => 'Oman',
				'PK' => 'Pakistan',
				'PA' => 'Panama',
				'PG' => 'Papua New Guinea',
				'PY' => 'Paraguay',
				'PE' => 'Peru',
				'PH' => 'Philippines',
				'PL' => 'Poland',
				'PT' => 'Portugal',
				'PR' => 'Puerto Rico',
				'QA' => 'Qatar',
				'RE' => 'Reunion Island',
				'RO' => 'Romania',
				'RU' => 'Russia',
				'RW' => 'Rwanda',
				'X8' => 'Saipan',
				'ST' => 'Sao Tome and Principe',
				'SA' => 'Saudi Arabia',
				'SN' => 'Senegal',
				'SC' => 'Seychelles',
				'SL' => 'Sierra Leone',
				'SG' => 'Singapore',
				'SK' => 'Slovakia',
				'SI' => 'Slovenia',
				'SB' => 'Solomon Islands',
				'SO' => 'Somalia',
				'X9' => 'Somaliland',
				'ZA' => 'South Africa',
				'ES' => 'Spain',
				'LK' => 'Sri Lanka',
				'BL' => 'St. Barthelemy',
				'XB' => 'St. Eustatius',
				'KN' => 'St. Kitts',
				'LC' => 'St. Lucia',
				'MF' => 'St. Maarten',
				'VC' => 'St. Vincent',
				'SR' => 'Suriname',
				'SZ' => 'Swaziland',
				'SE' => 'Sweden',
				'CH' => 'Switzerland',
				'XG' => 'Tahiti',
				'TW' => 'Taiwan',
				'TJ' => 'Tajikistan',
				'TZ' => 'Tanzania',
				'TH' => 'Thailand',
				'TG' => 'Togo',
				'TO' => 'Tonga',
				'TT' => 'Trinidad and Tobago',
				'TN' => 'Tunisia',
				'TR' => 'Turkey',
				'TM' => 'Turkmenistan',
				'TC' => 'Turks and Caicos Islands',
				'TV' => 'Tuvalu',
				'UG' => 'Uganda',
				'UA' => 'Ukraine',
				'AE' => 'United Arab Emirates',
				'GB' => 'United Kingdom',
				'US' => 'United States',
				'UY' => 'Uruguay',
				'UZ' => 'Uzbekistan',
				'VU' => 'Vanuatu',
				'VE' => 'Venezuela',
				'VN' => 'Vietnam',
				'VG' => 'Virgin Islands (BR)',
				'VI' => 'Virgin Islands (US)',
				'WS' => 'Western Samoa',
				'YE' => 'Yemen',
				'YU' => 'Yugoslavia',
				'ZM' => 'Zambia',
				'ZW' => 'Zimbabwe'
		));
		$select->setAttribute('class','form-control');
		$select->setAttribute('required','required');
		$this->add($select);
		
		$this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'city',
			'attributes' => array(
				'autocomplete' => 'off',
				'class' => 'form-control',
				'required' => 'required',
			),
        ));
		
		$this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'postalcode',
			'attributes' => array(
				'autocomplete' => 'off',
				'class' => 'form-control',
				'required' => 'required',
			),
        ));
		
		$this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'email',
			'attributes' => array(
				'autocomplete' => 'off',
				'class' => 'form-control',
				'required' => 'required',
			),
        ));
		
		$this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'mobileno',
			'attributes' => array(
				'autocomplete' => 'off',
				'class' => 'form-control',
				'required' => 'required',
			),
        ));
		
		$this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'phoneno',
			'attributes' => array(
				'autocomplete' => 'off',
				'class' => 'form-control',
				'required' => 'required',
			),
        ));
		
		$select = new \Zend\Form\Element\Select('inquirytype');
		$select->setValueOptions(array(
			 'NA' => 'NA',
		));
		$select->setAttribute('class','form-control');
		$select->setAttribute('required','required');
		$this->add($select);
		
		$this->add(array(
            'type' => 'Zend\Form\Element\Textarea',
            'name' => 'comments',
			'attributes' => array(
				'class' => 'form-control',
				'required' => 'required',
			),
        ));
		$pubKey = '6Le8uQMTAAAAAJvoBTgUTtMi4Qhy4VKGAJEqeQ4l';
		$privKey = '6Le8uQMTAAAAAHQYn5BWffSrIcpPIpmRA2qmT4Vy';
		$recaptcha = new \ZendService\ReCaptcha\ReCaptcha($pubKey, $privKey);
		
		$captcha = new \Zend\Captcha\ReCaptcha(array('theme' => 'white'));
		$captcha->setPubkey($pubKey);
		$captcha->setPrivkey($privKey);
		
		$this->add(array(
		 'type' => 'Zend\Form\Element\Captcha',
		 'name' => 'captcha',
		 'options' => array(
			 'label' => 'Please verify you are human',
			 'captcha' => $captcha
		 ),
	 ));
		
    }
	
	public function getInputFilterSpecification(){
		return array(			
			
        );
	}

    
}