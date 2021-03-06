<?php

use Illuminate\Database\Migrations\Migration;
use Dimsav\Translatable\Test\Model\Country;
use Dimsav\Translatable\Test\Model\CountryTranslation;

class AddSeeds extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        $countries = array(
            ['id'=>1, 'iso'=>'gr'],
            ['id'=>2, 'iso'=>'fr'],
            ['id'=>3, 'iso'=>'en'],
            ['id'=>4, 'iso'=>'de'],
        );

        $this->createCountries($countries);

        $countryTranslations = array(
            ['country_id' => 1, 'locale' => 'el', 'name' => 'Ελλάδα'],
            ['country_id' => 1, 'locale' => 'fr', 'name' => 'Grèce'],
            ['country_id' => 1, 'locale' => 'en', 'name' => 'Greece'],
            ['country_id' => 1, 'locale' => 'de', 'name' => 'Griechenland'],
            ['country_id' => 2, 'locale' => 'en', 'name' => 'France'],
        );

        $this->createCountryTranslations($countryTranslations);
	}

    private function createCountries($countries)
    {
        foreach ($countries as $data) {
            $country = new Country;
            $country->id = $data['id'];
            $country->iso = $data['iso'];
            $country->save();
        }
    }

    private function createCountryTranslations($translations)
    {
        foreach ($translations as $data) {
            $translation = new CountryTranslation;
            $translation->country_id = $data['country_id'];
            $translation->locale = $data['locale'];
            $translation->name = $data['name'];
            $translation->save();
        }
    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {}

}
