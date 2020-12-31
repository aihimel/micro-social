<?php namespace App\Database\Seeds;

class LocationSeeder extends \CodeIgniter\Database\Seeder
{
        public function run()
        {
            $locations = [
                'Dhaka',
                'Rajshahi',
                'Pabna',
                'Khulna',
                'Bogura'
            ];
            foreach($locations as $location) $this->db->table('locations')->insert(['location' => $location]);

        }
}