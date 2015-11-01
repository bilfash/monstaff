v <?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        $this->call('UsersTableSeeder');
				$this->call('DepartmentsTableSeeder');
        $this->call('PositionsTableSeeder');

	}

}

class DepartmentsTableSeeder extends Seeder {

       public function run()
       {
         //delete users table records
         DB::table('departments')->delete();
         DB::table('departments')->insert(array(
             array( 'name'=>'Admin','enabled'=>'1'),
             array('name'=>'Non Departemen','enabled'=>'1'),
             array('name'=>'Kaderisasi dan Pemetaan','enabled'=>'1'),
             array('name'=>'Dalam Negeri','enabled'=>'1'),
             array('name'=>'Hubungan Luar','enabled'=>'1'),
             array('name'=>'Kewirausahaan','enabled'=>'1'),
             array('name'=>'Minat Bakat','enabled'=>'1'),
             array('name'=>'Pengembangan Profesi','enabled'=>'1'),
             array('name'=>'Riset dan Teknologi','enabled'=>'1',),
             array('name'=>'Media Informasi','enabled'=>'1'),
             array('name'=>'Kesejahteraan Mahasiswa','enabled'=>'1',)
          ));
       }

}

class PositionsTableSeeder extends Seeder {

       public function run()
       {
         //delete users table records
         DB::table('positions')->delete();
         DB::table('positions')->insert(array(
             array('name'=>'Admin','enabled'=>'1'),
             array('name'=>'Staff','enabled'=>'1'),
             array('name'=>'Ketua Himpunan','enabled'=>'1'),
             array('name'=>'Wakahima Internal','enabled'=>'1'),
             array('name'=>'Wakahima Eksternal','enabled'=>'1'),
             array('name'=>'Bendahara Umum','enabled'=>'1'),
             array('name'=>'Sekretaris Umum','enabled'=>'1'),
             array('name'=>'Kepala Departemen','enabled'=>'1'),
             array('name'=>'Sekretaris Departemen','enabled'=>'1'),
             array('name'=>'Kepala Biro','enabled'=>'1'),
             array('name'=>'Staff Ahli','enabled'=>'1'),
             array('name'=>'Staff Ahli Biro','enabled'=>'1')
          ));
       }

}

class UsersTableSeeder extends Seeder {

       public function run()
       {
         //delete users table records
         DB::table('users')->delete();
         DB::table('users')->insert(array(
             array(   'name'=>'admin' , 'username'=>'admin' , 'password' => bcrypt('secret') , 'deptid' => '0' , 'positionid' => '0'),
             array(   'name'=>'john' , 'username'=>'wakahima' , 'password' => bcrypt('secret') , 'deptid' => '1' , 'positionid' => '2'),
             array(   'name'=>'bilfash' , 'username'=>'kadept' , 'password' => bcrypt('secret') , 'deptid' => '7' , 'positionid' => '7'),
             array(   'name'=>'sabila' , 'username'=>'staff' , 'password' => bcrypt('secret') , 'deptid' => '7' , 'positionid' => '1'),
             array(   'name'=>'rafiar' , 'username'=>'staff' , 'password' => bcrypt('secret') , 'deptid' => '8' , 'positionid' => '1'),
             array(   'name'=>'nafiar' , 'username'=>'staff' , 'password' => bcrypt('secret') , 'deptid' => '7' , 'positionid' => '1'),
          ));
       }

}
