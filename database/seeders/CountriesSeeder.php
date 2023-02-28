<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // data countries
        $countries = [
            [
                'name' => 'Aruba',
                'code' => 'aw',
            ],
            [
                'name' => 'Afghanistan',
                'code' => 'af',
            ],
            [
                'name' => 'Angola',
                'code' => 'ao',
            ],
            [
                'name' => 'Anguilla',
                'code' => 'ai',
            ],
            [
                'name' => 'Åland',
                'code' => 'ax',
            ],
            [
                'name' => 'Albania',
                'code' => 'al',
            ],
            [
                'name' => 'Andorra',
                'code' => 'ad',
            ],
            [
                'name' => 'United Arab Emirates',
                'code' => 'ae',
            ],
            [
                'name' => 'Argentina',
                'code' => 'ar',
            ],
            [
                'name' => 'Armenia',
                'code' => 'am',
            ],
            [
                'name' => 'American Samoa',
                'code' => 'as',
            ],
            [
                'name' => 'Antarctica',
                'code' => 'aq',
            ],
            [
                'name' => 'French Southern Territories',
                'code' => 'tf',
            ],
            [
                'name' => 'Antigua and Barbuda',
                'code' => 'ag',
            ],
            [
                'name' => 'Australia',
                'code' => 'au',
            ],
            [
                'name' => 'Austria',
                'code' => 'at',
            ],
            [
                'name' => 'Azerbaijan',
                'code' => 'az',
            ],
            [
                'name' => 'Burundi',
                'code' => 'bi',
            ],
            [
                'name' => 'Belgium',
                'code' => 'be',
            ],
            [
                'name' => 'Benin',
                'code' => 'bj',
            ],
            [
                'name' => 'Bonaire, Sint Eustatius and Saba',
                'code' => 'bq',
            ],
            [
                'name' => 'Burkina Faso',
                'code' => 'bf',
            ],
            [
                'name' => 'Bangladesh',
                'code' => 'bd',
            ],
            [
                'name' => 'Bulgaria',
                'code' => 'bg',
            ],
            [
                'name' => 'Bahrain',
                'code' => 'bh',
            ],
            [
                'name' => 'Bahamas',
                'code' => 'bs',
            ],
            [
                'name' => 'Bosnia and Herzegovina',
                'code' => 'ba',
            ],
            [
                'name' => 'Saint Barthélemy',
                'code' => 'bl',
            ],
            [
                'name' => 'Belarus',
                'code' => 'by',
            ],
            [
                'name' => 'Belize',
                'code' => 'bz',
            ],
            [
                'name' => 'Bermuda',
                'code' => 'bm',
            ],
            [
                'name' => 'Bolivia',
                'code' => 'bo',
            ],
            [
                'name' => 'Brazil',
                'code' => 'br',
            ],
            [
                'name' => 'Barbados',
                'code' => 'bb',
            ],
            [
                'name' => 'Brunei',
                'code' => 'bn',
            ],
            [
                'name' => 'Bhutan',
                'code' => 'bt',
            ],
            [
                'name' => 'Bouvet Island',
                'code' => 'bv',
            ],
            [
                'name' => 'Botswana',
                'code' => 'bw',
            ],
            [
                'name' => 'Central African Republic',
                'code' => 'cf',
            ],
            [
                'name' => 'Canada',
                'code' => 'ca',
            ],
            [
                'name' => 'Cocos (Keeling) Islands',
                'code' => 'cc',
            ],
            [
                'name' => 'Switzerland',
                'code' => 'ch',
            ],
            [
                'name' => 'Chile',
                'code' => 'cl',
            ],
            [
                'name' => 'China',
                'code' => 'cn',
            ],
            [
                'name' => 'Ivory Coast',
                'code' => 'ci',
            ],
            [
                'name' => 'Cameroon',
                'code' => 'cm',
            ],
            [
                'name' => 'DR Congo',
                'code' => 'cd',
            ],
            [
                'name' => 'Republic of the Congo',
                'code' => 'cg',
            ],
            [
                'name' => 'Cook Islands',
                'code' => 'ck',
            ],
            [
                'name' => 'Colombia',
                'code' => 'co',
            ],
            [
                'name' => 'Comoros',
                'code' => 'km',
            ],
            [
                'name' => 'Cape Verde',
                'code' => 'cv',
            ],
            [
                'name' => 'Costa Rica',
                'code' => 'cr',
            ],
            [
                'name' => 'Cuba',
                'code' => 'cu',
            ],
            [
                'name' => 'Curaçao',
                'code' => 'cw',
            ],
            [
                'name' => 'Christmas Island',
                'code' => 'cx',
            ],
            [
                'name' => 'Cayman Islands',
                'code' => 'ky',
            ],
            [
                'name' => 'Cyprus',
                'code' => 'cy',
            ],
            [
                'name' => 'Czech Republic',
                'code' => 'cz',
            ],
            [
                'name' => 'Germany',
                'code' => 'de',
            ],
            [
                'name' => 'Djibouti',
                'code' => 'dj',
            ],
            [
                'name' => 'Dominica',
                'code' => 'dm',
            ],
            [
                'name' => 'Denmark',
                'code' => 'dk',
            ],
            [
                'name' => 'Dominican Republic',
                'code' => 'do',
            ],
            [
                'name' => 'Algeria',
                'code' => 'dz',
            ],
            [
                'name' => 'Ecuador',
                'code' => 'ec',
            ],
            [
                'name' => 'Egypt',
                'code' => 'eg',
            ],
            [
                'name' => 'Eritrea',
                'code' => 'er',
            ],
            [
                'name' => 'Western Sahara',
                'code' => 'eh',
            ],
            [
                'name' => 'Spain',
                'code' => 'es',
            ],
            [
                'name' => 'Estonia',
                'code' => 'ee',
            ],
            [
                'name' => 'Ethiopia',
                'code' => 'et',
            ],
            [
                'name' => 'Finland',
                'code' => 'fi',
            ],
            [
                'name' => 'Fiji',
                'code' => 'fj',
            ],
            [
                'name' => 'Falkland Islands',
                'code' => 'fk',
            ],
            [
                'name' => 'France',
                'code' => 'fr',
            ],
            [
                'name' => 'Faroe Islands',
                'code' => 'fo',
            ],
            [
                'name' => 'Micronesia',
                'code' => 'fm',
            ],
            [
                'name' => 'Gabon',
                'code' => 'ga',
            ],
            [
                'name' => 'United Kingdom',
                'code' => 'gb',
            ],
            [
                'name' => 'Georgia',
                'code' => 'ge',
            ],
            [
                'name' => 'Guernsey',
                'code' => 'gg',
            ],
            [
                'name' => 'Ghana',
                'code' => 'gh',
            ],
            [
                'name' => 'Gibraltar',
                'code' => 'gi',
            ],
            [
                'name' => 'Guinea',
                'code' => 'gn',
            ],
            [
                'name' => 'Guadeloupe',
                'code' => 'gp',
            ],
            [
                'name' => 'Gambia',
                'code' => 'gm',
            ],
            [
                'name' => 'Guinea-Bissau',
                'code' => 'gw',
            ],
            [
                'name' => 'Equatorial Guinea',
                'code' => 'gq',
            ],
            [
                'name' => 'Greece',
                'code' => 'gr',
            ],
            [
                'name' => 'Grenada',
                'code' => 'gd',
            ],
            [
                'name' => 'Greenland',
                'code' => 'gl',
            ],
            [
                'name' => 'Guatemala',
                'code' => 'gt',
            ],
            [
                'name' => 'French Guiana',
                'code' => 'gf',
            ],
            [
                'name' => 'Guam',
                'code' => 'gu',
            ],
            [
                'name' => 'Guyana',
                'code' => 'gy',
            ],
            [
                'name' => 'Hong Kong',
                'code' => 'hk',
            ],
            [
                'name' => 'Heard Island and McDonald Islands',
                'code' => 'hm',
            ],
            [
                'name' => 'Honduras',
                'code' => 'hn',
            ],
            [
                'name' => 'Croatia',
                'code' => 'hr',
            ],
            [
                'name' => 'Haiti',
                'code' => 'ht',
            ],
            [
                'name' => 'Hungary',
                'code' => 'hu',
            ],
            [
                'name' => 'Indonesia',
                'code' => 'id',
            ],
            [
                'name' => 'Isle of Man',
                'code' => 'im',
            ],
            [
                'name' => 'India',
                'code' => 'in',
            ],
            [
                'name' => 'British Indian Ocean Territory',
                'code' => 'io',
            ],
            [
                'name' => 'Ireland',
                'code' => 'ie',
            ],
            [
                'name' => 'Iran',
                'code' => 'ir',
            ],
            [
                'name' => 'Iraq',
                'code' => 'iq',
            ],
            [
                'name' => 'Iceland',
                'code' => 'is',
            ],
            [
                'name' => 'Israel',
                'code' => 'il',
            ],
            [
                'name' => 'Italy',
                'code' => 'it',
            ],
            [
                'name' => 'Jamaica',
                'code' => 'jm',
            ],
            [
                'name' => 'Jersey',
                'code' => 'je',
            ],
            [
                'name' => 'Jordan',
                'code' => 'jo',
            ],
            [
                'name' => 'Japan',
                'code' => 'jp',
            ],
            [
                'name' => 'Kazakhstan',
                'code' => 'kz',
            ],
            [
                'name' => 'Kenya',
                'code' => 'ke',
            ],
            [
                'name' => 'Kyrgyzstan',
                'code' => 'kg',
            ],
            [
                'name' => 'Cambodia',
                'code' => 'kh',
            ],
            [
                'name' => 'Kiribati',
                'code' => 'ki',
            ],
            [
                'name' => 'Comoros',
                'code' => 'km',
            ],
            [
                'name' => 'Saint Kitts and Nevis',
                'code' => 'kn',
            ],
            [
                'name' => 'North Korea',
                'code' => 'kp',
            ],
            [
                'name' => 'South Korea',
                'code' => 'kr',
            ],
            [
                'name' => 'Kuwait',
                'code' => 'kw',
            ],
            [
                'name' => 'Cayman Islands',
                'code' => 'ky',
            ],
            [
                'name' => 'Kazakhstan',
                'code' => 'kz',
            ],
            [
                'name' => 'Laos',
                'code' => 'la',
            ],
            [
                'name' => 'Lebanon',
                'code' => 'lb',
            ],
            [
                'name' => 'Saint Lucia',
                'code' => 'lc',
            ],
            [
                'name' => 'Liechtenstein',
                'code' => 'li',
            ],
            [
                'name' => 'Sri Lanka',
                'code' => 'lk',
            ],
            [
                'name' => 'Liberia',
                'code' => 'lr',
            ],
            [
                'name' => 'Lesotho',
                'code' => 'ls',
            ],
            [
                'name' => 'Lithuania',
                'code' => 'lt',
            ],
            [
                'name' => 'Luxembourg',
                'code' => 'lu',
            ],
            [
                'name' => 'Latvia',
                'code' => 'lv',
            ],
            [
                'name' => 'Libya',
                'code' => 'ly',
            ],
            [
                'name' => 'Morocco',
                'code' => 'ma',
            ],
            [
                'name' => 'Monaco',
                'code' => 'mc',
            ],
            [
                'name' => 'Moldova',
                'code' => 'md',
            ],
            [
                'name' => 'Montenegro',
                'code' => 'me',
            ],
            [
                'name' => 'Saint Martin',
                'code' => 'mf',
            ],
            [
                'name' => 'Madagascar',
                'code' => 'mg',
            ],
            [
                'name' => 'Marshall Islands',
                'code' => 'mh',
            ],
            [
                'name' => 'Macedonia',
                'code' => 'mk',
            ],
            [
                'name' => 'Mali',
                'code' => 'ml',
            ],
            [
                'name' => 'Myanmar',
                'code' => 'mm',
            ],
            [
                'name' => 'Mongolia',
                'code' => 'mn',
            ],
            [
                'name' => 'Macao',
                'code' => 'mo',
            ],
            [
                'name' => 'Northern Mariana Islands',
                'code' => 'mp',
            ],
            [
                'name' => 'Martinique',
                'code' => 'mq',
            ],
            [
                'name' => 'Mauritania',
                'code' => 'mr',
            ],
            [
                'name' => 'Montserrat',
                'code' => 'ms',
            ],
            [
                'name' => 'Malta',
                'code' => 'mt',
            ],
            [
                'name' => 'Mauritius',
                'code' => 'mu',
            ],
            [
                'name' => 'Maldives',
                'code' => 'mv',
            ],
            [
                'name' => 'Malawi',
                'code' => 'mw',
            ],
            [
                'name' => 'Mexico',
                'code' => 'mx',
            ],
            [
                'name' => 'Malaysia',
                'code' => 'my',
            ],
            [
                'name' => 'Mozambique',
                'code' => 'mz',
            ],
            [
                'name' => 'Namibia',
                'code' => 'na',
            ],
            [
                'name' => 'New Caledonia',
                'code' => 'nc',
            ],
            [
                'name' => 'Niger',
                'code' => 'ne',
            ],
            [
                'name' => 'Norfolk Island',
                'code' => 'nf',
            ],
            [
                'name' => 'Nigeria',
                'code' => 'ng',
            ],
            [
                'name' => 'Nicaragua',
                'code' => 'ni',
            ],
            [
                'name' => 'Netherlands',
                'code' => 'nl',
            ],
            [
                'name' => 'Norway',
                'code' => 'no',
            ],
            [
                'name' => 'Nepal',
                'code' => 'np',
            ],
            [
                'name' => 'Nauru',
                'code' => 'nr',
            ],
            [
                'name' => 'Niue',
                'code' => 'nu',
            ],
            [
                'name' => 'New Zealand',
                'code' => 'nz',
            ],
            [
                'name' => 'Oman',
                'code' => 'om',
            ],
            [
                'name' => 'Panama',
                'code' => 'pa',
            ],
            [
                'name' => 'Peru',
                'code' => 'pe',
            ],
            [
                'name' => 'French Polynesia',
                'code' => 'pf',
            ],
            [
                'name' => 'Papua New Guinea',
                'code' => 'pg',
            ],
            [
                'name' => 'Philippines',
                'code' => 'ph',
            ],
            [
                'name' => 'Pakistan',
                'code' => 'pk',
            ],
            [
                'name' => 'Poland',
                'code' => 'pl',
            ],
            [
                'name' => 'Saint Pierre and Miquelon',
                'code' => 'pm',
            ],
            [
                'name' => 'Pitcairn',
                'code' => 'pn',
            ],
            [
                'name' => 'Puerto Rico',
                'code' => 'pr',
            ],
            [
                'name' => 'North Korea',
                'code' => 'kp',
            ],
            [
                'name' => 'Portugal',
                'code' => 'pt',
            ],
            [
                'name' => 'Paraguay',
                'code' => 'py',
            ],
            [
                'name' => 'Palestine',
                'code' => 'ps',
            ],
            [
                'name' => 'French Guiana',
                'code' => 'gf',
            ],
            [
                'name' => 'Qatar',
                'code' => 'qa',
            ],
            [
                'name' => 'Reunion',
                'code' => 're',
            ],
            [
                'name' => 'Romania',
                'code' => 'ro',
            ],
            [
                'name' => 'Serbia',
                'code' => 'rs',
            ],
            [
                'name' => 'Russia',
                'code' => 'ru',
            ],
            [
                'name' => 'Rwanda',
                'code' => 'rw',
            ],
            [
                'name' => 'Saudi Arabia',
                'code' => 'sa',
            ],
            [
                'name' => 'Solomon Islands',
                'code' => 'sb',
            ],
            [
                'name' => 'Seychelles',
                'code' => 'sc',
            ],
            [
                'name' => 'Sudan',
                'code' => 'sd',
            ],
            [
                'name' => 'Sweden',
                'code' => 'se',
            ],
            [
                'name' => 'Singapore',
                'code' => 'sg',
            ],
            [
                'name' => 'Saint Helena',
                'code' => 'sh',
            ],
            [
                'name' => 'Slovenia',
                'code' => 'si',
            ],
            [
                'name' => 'Svalbard and Jan Mayen',
                'code' => 'sj',
            ],
            [
                'name' => 'Slovakia',
                'code' => 'sk',
            ],
            [
                'name' => 'Sierra Leone',
                'code' => 'sl',
            ],
            [
                'name' => 'San Marino',
                'code' => 'sm',
            ],
            [
                'name' => 'Senegal',
                'code' => 'sn',
            ],
            [
                'name' => 'Somalia',
                'code' => 'so',
            ],
            [
                'name' => 'Suriname',
                'code' => 'sr',
            ],
            [
                'name' => 'South Sudan',
                'code' => 'ss',
            ],
            [
                'name' => 'Sao Tome and Principe',
                'code' => 'st',
            ],
            [
                'name' => 'El Salvador',
                'code' => 'sv',
            ],
            [
                'name' => 'Sint Maarten',
                'code' => 'sx',
            ],
            [
                'name' => 'Syria',
                'code' => 'sy',
            ],
            [
                'name' => 'Swaziland',
                'code' => 'sz',
            ],
            [
                'name' => 'Turks and Caicos Islands',
                'code' => 'tc',
            ],
            [
                'name' => 'Chad',
                'code' => 'td',
            ],
            [
                'name' => 'French Southern Territories',
                'code' => 'tf',
            ],
            [
                'name' => 'Togo',
                'code' => 'tg',
            ],
            [
                'name' => 'Thailand',
                'code' => 'th',
            ],
            [
                'name' => 'Tajikistan',
                'code' => 'tj',
            ],
            [
                'name' => 'Tokelau',
                'code' => 'tk',
            ],
            [
                'name' => 'East Timor',
                'code' => 'tl',
            ],
            [
                'name' => 'Turkmenistan',
                'code' => 'tm',
            ],
            [
                'name' => 'Tunisia',
                'code' => 'tn',
            ],
            [
                'name' => 'Tonga',
                'code' => 'to',
            ],
            [
                'name' => 'Turkey',
                'code' => 'tr',
            ],
            [
                'name' => 'Trinidad and Tobago',
                'code' => 'tt',
            ],
            [
                'name' => 'Tuvalu',
                'code' => 'tv',
            ],
            [
                'name' => 'Taiwan',
                'code' => 'tw',
            ],
            [
                'name' => 'Tanzania',
                'code' => 'tz',
            ],
            [
                'name' => 'Ukraine',
                'code' => 'ua',
            ],
            [
                'name' => 'Uganda',
                'code' => 'ug',
            ],
            [
                'name' => 'United States Minor Outlying Islands',
                'code' => 'um',
            ],
            [
                'name' => 'United States',
                'code' => 'us',
            ],
            [
                'name' => 'Uruguay',
                'code' => 'uy',
            ],
            [
                'name' => 'Uzbekistan',
                'code' => 'uz',
            ],
            [
                'name' => 'Vatican',
                'code' => 'va',
            ],
            [
                'name' => 'Saint Vincent and the Grenadines',
                'code' => 'vc',
            ],
            [
                'name' => 'Venezuela',
                'code' => 've',
            ],
            [
                'name' => 'British Virgin Islands',
                'code' => 'vg',
            ],
            [
                'name' => 'U.S. Virgin Islands',
                'code' => 'vi',
            ],
            [
                'name' => 'Vietnam',
                'code' => 'vn',
            ],
            [
                'name' => 'Vanuatu',
                'code' => 'vu',
            ],
            [
                'name' => 'Wallis and Futuna',
                'code' => 'wf',
            ],
            [
                'name' => 'Samoa',
                'code' => 'ws',
            ],
            [
                'name' => 'Kosovo',
                'code' => 'xk',
            ],
            [
                'name' => 'Yemen',
                'code' => 'ye',
            ],
            [
                'name' => 'Mayotte',
                'code' => 'yt',
            ],
            [
                'name' => 'South Africa',
                'code' => 'za',
            ],
            [
                'name' => 'Zambia',
                'code' => 'zm',
            ],
            [
                'name' => 'Zimbabwe',
                'code' => 'zw',
            ],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
