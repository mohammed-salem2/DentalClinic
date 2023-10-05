<?php

namespace Database\Seeders;

use App\Models\Advice;
use App\Models\Appointment;
use App\Models\BaseRole;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Diagnose;
use App\Models\File;
use App\Models\Registration;
use App\Models\Schedule;
use App\Models\Treatment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = BaseRole::create(['name' => 'Admin' , 'guard_name' => 'web']);
        $doctor = BaseRole::create(['name' => 'Doctor' , 'guard_name' => 'web']);
        $patient = BaseRole::create(['name' => 'Patient' , 'guard_name' => 'web']);
        // Category::insert([
        //     ['name' => 'Heart'],
        //     ['name' => 'Brain'],
        //     ['name' => 'Breathing'],
        //     ['name' => 'Dentist'],
        //     ['name' => 'Bones'],
        //     ['name' => 'Blood'],
        //     ['name' => 'Tests'],
        // ]);
        $user_admin = User::create([
            'name' => 'Karim Balousha',
            'email' => 'karim@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'account_id' => generateID(),
            'phone' => '0599123120',
            'address' => 'Palestine , Gaza'
        ]);
        $user_doctor = User::create([
            'name' => 'Khaled Hassan',
            'email' => 'khaled@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'account_id' => generateID(),
            'category_id' => 1,
            'phone' => '0599123121',
            'address' => 'Palestine , Gaza'
        ]);
        $user_doctor1 = User::create([
            'name' => 'Ahmed Hassan',
            'email' => 'ahmed@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'account_id' => generateID(),
            'category_id' => 2,
            'phone' => '0599123122',
            'address' => 'Palestine , Gaza'
        ]);
        $user_patient = User::create([
            'name' => 'Sami Shahin',
            'email' => 'sami@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'account_id' => generateID(),
            'phone' => '0599123123',
            'address' => 'Palestine , Gaza'
        ]);
        $user_admin->assignRole($admin);
        $user_doctor->assignRole($doctor);
        $user_doctor1->assignRole($doctor);
        $user_patient->assignRole($patient);
        Schedule::insert([
            ['day' => 'Saturday' , 'time' => '08:00 - 08:50' , 'user_id' => $user_doctor->id , 'created_at' => now()],
            ['day' => 'Saturday' , 'time' => '09:00 - 09:50' , 'user_id' => $user_doctor->id, 'created_at' => now()],
            ['day' => 'Sunday' , 'time' => '10:00 - 10:50' , 'user_id' => $user_doctor->id, 'created_at' => now()],
            ['day' => 'Sunday' , 'time' => '11:00 - 11:50' , 'user_id' => $user_doctor->id, 'created_at' => now()],
            ['day' => 'Monday' , 'time' => '12:00 - 12:50' , 'user_id' => $user_doctor->id, 'created_at' => now()],
            ['day' => 'Monday' , 'time' => '01:00 - 01:50' , 'user_id' => $user_doctor->id, 'created_at' => now()],
            ['day' => 'Tuesday' , 'time' => '08:00 - 08:50' , 'user_id' => $user_doctor->id, 'created_at' => now()],
            ['day' => 'Tuesday' , 'time' => '09:00 - 09:50' , 'user_id' => $user_doctor->id, 'created_at' => now()],
            ['day' => 'Wednesday' , 'time' => '10:00 - 10:50' , 'user_id' => $user_doctor->id, 'created_at' => now()],
            ['day' => 'Wednesday' , 'time' => '11:00 - 11:50' , 'user_id' => $user_doctor->id, 'created_at' => now()],
            ['day' => 'Thursday' , 'time' => '12:00 - 12:50' , 'user_id' => $user_doctor->id, 'created_at' => now()],
            ['day' => 'Thursday' , 'time' => '01:00 - 01:50' , 'user_id' => $user_doctor->id, 'created_at' => now()],
            ['day' => 'Monday' , 'time' => '01:00 - 01:50' , 'user_id' => $user_doctor1->id, 'created_at' => now()],
            ['day' => 'Tuesday' , 'time' => '08:00 - 08:50' , 'user_id' => $user_doctor1->id, 'created_at' => now()],
            ['day' => 'Tuesday' , 'time' => '09:00 - 09:50' , 'user_id' => $user_doctor1->id, 'created_at' => now()],
            ['day' => 'Wednesday' , 'time' => '10:00 - 10:50' , 'user_id' => $user_doctor1->id, 'created_at' => now()],
        ]);
        Registration::create([
            'name' => 'Patient',
            'email' => 'ab.karimbalousha@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'phone' => '0599123124',
            'type' => 2,
            'address' => 'Palestine , Gaza'
        ]);
        Registration::insert([
            [
                'name' => 'Ahmed Hassan',
                'email' => 'ahmed@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'status' => 1,
                'type' => 1,
                'phone' => '0599123125',
                'address' => 'Palestine , Gaza',
                'created_at' => now()
            ],
            [
                'name' => 'request',
                'email' => 'request1@gamil.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'status' => 2,
                'type' => 1,
                'phone' => '0599123126',
                'address' => 'Palestine , Gaza',
                'created_at' => now()
            ]
        ]);
        File::create([
            'file' => 'http://127.0.0.1:8000/storage/aaaa1/file20220622164111041140.pdf',
            'user_id' => 3,
        ]);
        Appointment::insert([
            [
                'patient_id' => 4,
                'doctor_id' => 2,
                'schedule_id' => 1,
                'status' => 1,
                'date' => now()->toDateString(),
                'created_at' => now()
            ],
            [
                'patient_id' => 4,
                'doctor_id' => 2,
                'schedule_id' => 2,
                'status' => 2,
                'date' => now()->toDateString(),
                'created_at' => now()
            ]
        ]);
        Treatment::insert([
            [
                'medicine' => 'Abacavir',
                'details' => 'Abacavir is used along with other medications to treat human immunodeficiency virus (HIV) infection. Abacavir is in a class of medications called nucleoside reverse transcriptase inhibitors (NRTIs). It works by decreasing the amount of HIV in the blood',
                'doctor_id' => '2',
                'patient_id' => '4',
                'date' => '2022-06-09',
                'created_at' => '2022-06-09 09:58:25',
                'updated_at' => '2022-06-09 09:58:25'
            ],
            [
                'medicine' => 'Alemtuzumab',
                'details' => 'Alemtuzumab is a monoclonal antibody that targets an antigen known as CD52, a common antigen found on B and T cells (part of the body\'s immune system). When the alemtuzumab antibody attaches to the CD52 antigen, the body\'s immune system is activated to destroy these targeted cells in the blood and bone marrow.',
                'doctor_id' => '3',
                'patient_id' => '4',
                'date' => '2022-06-09',
                'created_at' => '2022-06-09 09:58:25',
                'updated_at' => '2022-06-09 09:58:25'
            ],
        ]);
        Diagnose::insert([
            [
                'diagnose' => 'Abacavir',
                'details' => 'Abacavir is used along with other medications to treat human immunodeficiency virus (HIV) infection. Abacavir is in a class of medications called nucleoside reverse transcriptase inhibitors (NRTIs). It works by decreasing the amount of HIV in the blood',
                'doctor_id' => '2',
                'patient_id' => '4',
                'date' => '2022-06-09',
                'created_at' => '2022-06-09 09:58:25',
                'updated_at' => '2022-06-09 09:58:25'
            ],
            [
                'diagnose' => 'Alemtuzumab',
                'details' => 'Alemtuzumab is a monoclonal antibody that targets an antigen known as CD52, a common antigen found on B and T cells (part of the body\'s immune system). When the alemtuzumab antibody attaches to the CD52 antigen, the body\'s immune system is activated to destroy these targeted cells in the blood and bone marrow.',
                'doctor_id' => '3',
                'patient_id' => '4',
                'date' => '2022-06-09',
                'created_at' => '2022-06-09 09:58:25',
                'updated_at' => '2022-06-09 09:58:25'
            ],
        ]);
        Advice::insert([
            [
                'advice' => 'Take part in your health care.'.
                    'Tell each provider about what health care you have had and who has provided it.'.
                    'Let them know about any other treatments you have tried that were not prescribed by a doctor, such as herbal treatments, home remedies or acupuncture.'.
                    'Tell your providers about any cultural and spiritual needs you may have.'.
                    'To be sure you understand health-care instructions, repeat them to a family member or friend.'.
                    'Let any provider know if you are not sure about any part of your care. If you think something might not be safe, tell your providers right away.',
                'created_at' => '2022-06-09 09:58:25',
                'updated_at' => '2022-06-09 09:58:25'
            ],
            [
                'advice' => 'Ask questions, ask questions, ask questions.When you choose a health-care provider, pick one who is easy to talk with about your health care.'.
                    'Ask your provider when and how you will get the results of any test or treatment. When you get the results, make sure you know what the results mean for you.'.
                    'Have your provider explain your treatment choices, any treatment risks and how treatment may help.'.
                    'Get a second opinion if you are not sure about what treatment to choose.'.
                    'Learn what changes you need to make to help you get better.',
                'created_at' => '2022-06-09 09:58:25',
                'updated_at' => '2022-06-09 09:58:25'
            ],
            [
                'advice' => 'Bring a family member or friend with you to be your partner in care.'.
                    'Pick someone who will speak up for you and help get things done for you.'.
                    'Show your partner in care where to find your medical records at home. Let them know what medicines you take and where they are located.'.
                    'Plan for your partner in care to stay with you during exams, treatments and in the hospital.'.
                    'It’s OK for your partner in care to ask questions and take notes.',
                'created_at' => '2022-06-09 09:58:25',
                'updated_at' => '2022-06-09 09:58:25'
            ],
            [
                'advice' => 'Require each provider to know who you are before they treat you.'.
                    'Ask providers to checktwo forms of identification each time they care for you.'.
                    'If you are given a wristband, be sure it has your name on it and that your name is spelled right.'.
                    'Also, look for the name badge on all providers who are caring for you.',
                'created_at' => '2022-06-09 09:58:25',
                'updated_at' => '2022-06-09 09:58:25'
            ],
            [
                'advice' => 'Share a list of all medicines you take with your providers.'.
                    'Include all medicines, vitamins, herbs and supplements on the list.'.
                    'Bring the list with you to every visit.  Here is a printable Personal Medication Record.'.
                    'Let your provider know about your allergies.'.
                    'Let your provider know if you have had a bad reaction to any medicines.',
                'created_at' => '2022-06-09 09:58:25',
                'updated_at' => '2022-06-09 09:58:25'
            ],
            [
                'advice' => 'Know about your medicines.'.
                    'Ask your provider what a new medicine is for and how it will help you.'.
                    'Have the brand names and any other names for the medicine written down for you.'.
                    'Find out how to take the medicine and for how long.'.
                    'Ask the pharmacist for written information about what to watch for when you take the medicine.',
                'created_at' => '2022-06-09 09:58:25',
                'updated_at' => '2022-06-09 09:58:25'
            ],
            [
                'advice' => 'Prepare for treatments and operations.'.
                    'Before your treatment or operation, know what medicines to take or not take, what you can or cannot eat or drink, and what you should or should not wear.'.
                    'Make sure that you and your providers all agree on what will be done during the treatment or operation.'.
                    'Help your provider find and mark the part of your body that will be operated on.'.
                    'Make sure only the part of your body having the operation is marked. It can be confusing if other sites are marked.',
                'created_at' => '2022-06-09 09:58:25',
                'updated_at' => '2022-06-09 09:58:25'
            ]
        ]);
        Blog::insert([
            [
                'title' => 'The Importance of Dental Technology',
                'subject' => '<h1><span style="">The Importance of Dental Technology&nbsp;&nbsp;</span></h1><p><span style="">Both dentists and patients benefit from dental technology. Thanks to the many advances in dental technology, oral health problems can be detected earlier and treated faster. Today, oral health solutions are more promising than ever.&nbsp;</span></p><h2><span style="">How Dental Technology Improves Oral Health&nbsp;</span></h2><p><span style="">When you visit your dentist office or the dental aisle at your local pharmacy, you may find that dental technology, instruments, and treatment have changed since you were a child. Thanks to modern technologies, dentists can now identify and treat many problems more conveniently and efficiently than traditional methods. Let’s look at some of the ways advances in </span><a href="https://www.jeffersondentalclinics.com/dental-services/dental-technology"><span style="">dental technology</span></a><span style=""> have helped patients at home and in the dental office.</span></p><h3><span style="">Water Flossing</span></h3><p><span style="">As with flossing, water flossing removes the food stuck between your teeth. It also removes bacteria before it hardens into plaque. Plaque can turn into tartar and lead to tooth decay and gum disease. Your toothbrush can’t get into those tiny spaces where plaque forms, making water flossing a great tool to prevent gum disease and bleeding gums.&nbsp;</span></p><p><span style="">The American Dental Association says water flossing with products labeled with the ADA Seal of Acceptance can eliminate plaque.</span></p><h3><span style="">Ultrasonic Toothbrushes</span></h3><p><span style="">Ultrasonic toothbrushes on the market today offer frequencies up to over 50,000 brushes per minute. Ultrasonic toothbrushes clean teeth not through physical movements, but through high-frequency vibrations called ultrasound to remove plaque and food debris. Jefferson Dental &amp; Orthodontics recommends <a href="https://www.usa.philips.com/c-m-pe/electric-toothbrushes">Phillips Sonicare</a> as our preferred ultrasonic toothbrush.</span></p>',
                'logo' => 'media/assets/blog/img-1.jpeg',
                'created_at' => now(),
            ],
            [
                'title' => 'Reasons to Smile: Summer 2022',
                'subject' => '<h1><span style="">The Importance of Dental Technology&nbsp;&nbsp;</span></h1><p><span style="">Both dentists and patients benefit from dental technology. Thanks to the many advances in dental technology, oral health problems can be detected earlier and treated faster. Today, oral health solutions are more promising than ever.&nbsp;</span></p><h2><span style="">How Dental Technology Improves Oral Health&nbsp;</span></h2><p><span style="">When you visit your dentist office or the dental aisle at your local pharmacy, you may find that dental technology, instruments, and treatment have changed since you were a child. Thanks to modern technologies, dentists can now identify and treat many problems more conveniently and efficiently than traditional methods. Let’s look at some of the ways advances in </span><a href="https://www.jeffersondentalclinics.com/dental-services/dental-technology"><span style="">dental technology</span></a><span style=""> have helped patients at home and in the dental office.</span></p><h3><span style="">Water Flossing</span></h3><p><span style="">As with flossing, water flossing removes the food stuck between your teeth. It also removes bacteria before it hardens into plaque. Plaque can turn into tartar and lead to tooth decay and gum disease. Your toothbrush can’t get into those tiny spaces where plaque forms, making water flossing a great tool to prevent gum disease and bleeding gums.&nbsp;</span></p><p><span style="">The American Dental Association says water flossing with products labeled with the ADA Seal of Acceptance can eliminate plaque.</span></p><h3><span style="">Ultrasonic Toothbrushes</span></h3><p><span style="">Ultrasonic toothbrushes on the market today offer frequencies up to over 50,000 brushes per minute. Ultrasonic toothbrushes clean teeth not through physical movements, but through high-frequency vibrations called ultrasound to remove plaque and food debris. Jefferson Dental &amp; Orthodontics recommends <a href="https://www.usa.philips.com/c-m-pe/electric-toothbrushes">Phillips Sonicare</a> as our preferred ultrasonic toothbrush.</span></p>',
                'logo' => 'media/assets/blog/img-2.jpeg',
                'created_at' => now(),
            ],
            [
                'title' => '10 Reasons to Smile with Invisalign',
                'subject' => '<h1><span style="">The Importance of Dental Technology&nbsp;&nbsp;</span></h1><p><span style="">Both dentists and patients benefit from dental technology. Thanks to the many advances in dental technology, oral health problems can be detected earlier and treated faster. Today, oral health solutions are more promising than ever.&nbsp;</span></p><h2><span style="">How Dental Technology Improves Oral Health&nbsp;</span></h2><p><span style="">When you visit your dentist office or the dental aisle at your local pharmacy, you may find that dental technology, instruments, and treatment have changed since you were a child. Thanks to modern technologies, dentists can now identify and treat many problems more conveniently and efficiently than traditional methods. Let’s look at some of the ways advances in </span><a href="https://www.jeffersondentalclinics.com/dental-services/dental-technology"><span style="">dental technology</span></a><span style=""> have helped patients at home and in the dental office.</span></p><h3><span style="">Water Flossing</span></h3><p><span style="">As with flossing, water flossing removes the food stuck between your teeth. It also removes bacteria before it hardens into plaque. Plaque can turn into tartar and lead to tooth decay and gum disease. Your toothbrush can’t get into those tiny spaces where plaque forms, making water flossing a great tool to prevent gum disease and bleeding gums.&nbsp;</span></p><p><span style="">The American Dental Association says water flossing with products labeled with the ADA Seal of Acceptance can eliminate plaque.</span></p><h3><span style="">Ultrasonic Toothbrushes</span></h3><p><span style="">Ultrasonic toothbrushes on the market today offer frequencies up to over 50,000 brushes per minute. Ultrasonic toothbrushes clean teeth not through physical movements, but through high-frequency vibrations called ultrasound to remove plaque and food debris. Jefferson Dental &amp; Orthodontics recommends <a href="https://www.usa.philips.com/c-m-pe/electric-toothbrushes">Phillips Sonicare</a> as our preferred ultrasonic toothbrush.</span></p>',
                'logo' => 'media/assets/blog/img-3.jpeg',
                'created_at' => now(),
            ],
            [
                'title' => 'Home Remedies For Toothache: What Works?',
                'subject' => '<h1><span style="">The Importance of Dental Technology&nbsp;&nbsp;</span></h1><p><span style="">Both dentists and patients benefit from dental technology. Thanks to the many advances in dental technology, oral health problems can be detected earlier and treated faster. Today, oral health solutions are more promising than ever.&nbsp;</span></p><h2><span style="">How Dental Technology Improves Oral Health&nbsp;</span></h2><p><span style="">When you visit your dentist office or the dental aisle at your local pharmacy, you may find that dental technology, instruments, and treatment have changed since you were a child. Thanks to modern technologies, dentists can now identify and treat many problems more conveniently and efficiently than traditional methods. Let’s look at some of the ways advances in </span><a href="https://www.jeffersondentalclinics.com/dental-services/dental-technology"><span style="">dental technology</span></a><span style=""> have helped patients at home and in the dental office.</span></p><h3><span style="">Water Flossing</span></h3><p><span style="">As with flossing, water flossing removes the food stuck between your teeth. It also removes bacteria before it hardens into plaque. Plaque can turn into tartar and lead to tooth decay and gum disease. Your toothbrush can’t get into those tiny spaces where plaque forms, making water flossing a great tool to prevent gum disease and bleeding gums.&nbsp;</span></p><p><span style="">The American Dental Association says water flossing with products labeled with the ADA Seal of Acceptance can eliminate plaque.</span></p><h3><span style="">Ultrasonic Toothbrushes</span></h3><p><span style="">Ultrasonic toothbrushes on the market today offer frequencies up to over 50,000 brushes per minute. Ultrasonic toothbrushes clean teeth not through physical movements, but through high-frequency vibrations called ultrasound to remove plaque and food debris. Jefferson Dental &amp; Orthodontics recommends <a href="https://www.usa.philips.com/c-m-pe/electric-toothbrushes">Phillips Sonicare</a> as our preferred ultrasonic toothbrush.</span></p>',
                'logo' => 'media/assets/blog/img-4.jpeg',
                'created_at' => now(),
            ],
            [
                'title' => 'Give the Gift of Braces (or Invisalign!) This Holiday Season',
                'subject' => '<h1><span style="">The Importance of Dental Technology&nbsp;&nbsp;</span></h1><p><span style="">Both dentists and patients benefit from dental technology. Thanks to the many advances in dental technology, oral health problems can be detected earlier and treated faster. Today, oral health solutions are more promising than ever.&nbsp;</span></p><h2><span style="">How Dental Technology Improves Oral Health&nbsp;</span></h2><p><span style="">When you visit your dentist office or the dental aisle at your local pharmacy, you may find that dental technology, instruments, and treatment have changed since you were a child. Thanks to modern technologies, dentists can now identify and treat many problems more conveniently and efficiently than traditional methods. Let’s look at some of the ways advances in </span><a href="https://www.jeffersondentalclinics.com/dental-services/dental-technology"><span style="">dental technology</span></a><span style=""> have helped patients at home and in the dental office.</span></p><h3><span style="">Water Flossing</span></h3><p><span style="">As with flossing, water flossing removes the food stuck between your teeth. It also removes bacteria before it hardens into plaque. Plaque can turn into tartar and lead to tooth decay and gum disease. Your toothbrush can’t get into those tiny spaces where plaque forms, making water flossing a great tool to prevent gum disease and bleeding gums.&nbsp;</span></p><p><span style="">The American Dental Association says water flossing with products labeled with the ADA Seal of Acceptance can eliminate plaque.</span></p><h3><span style="">Ultrasonic Toothbrushes</span></h3><p><span style="">Ultrasonic toothbrushes on the market today offer frequencies up to over 50,000 brushes per minute. Ultrasonic toothbrushes clean teeth not through physical movements, but through high-frequency vibrations called ultrasound to remove plaque and food debris. Jefferson Dental &amp; Orthodontics recommends <a href="https://www.usa.philips.com/c-m-pe/electric-toothbrushes">Phillips Sonicare</a> as our preferred ultrasonic toothbrush.</span></p>',
                'logo' => 'media/assets/blog/img-5.jpeg',
                'created_at' => now(),
            ],
            [
                'title' => 'The Truth About At-Home Aligners',
                'subject' => '<h1><span style="">The Importance of Dental Technology&nbsp;&nbsp;</span></h1><p><span style="">Both dentists and patients benefit from dental technology. Thanks to the many advances in dental technology, oral health problems can be detected earlier and treated faster. Today, oral health solutions are more promising than ever.&nbsp;</span></p><h2><span style="">How Dental Technology Improves Oral Health&nbsp;</span></h2><p><span style="">When you visit your dentist office or the dental aisle at your local pharmacy, you may find that dental technology, instruments, and treatment have changed since you were a child. Thanks to modern technologies, dentists can now identify and treat many problems more conveniently and efficiently than traditional methods. Let’s look at some of the ways advances in </span><a href="https://www.jeffersondentalclinics.com/dental-services/dental-technology"><span style="">dental technology</span></a><span style=""> have helped patients at home and in the dental office.</span></p><h3><span style="">Water Flossing</span></h3><p><span style="">As with flossing, water flossing removes the food stuck between your teeth. It also removes bacteria before it hardens into plaque. Plaque can turn into tartar and lead to tooth decay and gum disease. Your toothbrush can’t get into those tiny spaces where plaque forms, making water flossing a great tool to prevent gum disease and bleeding gums.&nbsp;</span></p><p><span style="">The American Dental Association says water flossing with products labeled with the ADA Seal of Acceptance can eliminate plaque.</span></p><h3><span style="">Ultrasonic Toothbrushes</span></h3><p><span style="">Ultrasonic toothbrushes on the market today offer frequencies up to over 50,000 brushes per minute. Ultrasonic toothbrushes clean teeth not through physical movements, but through high-frequency vibrations called ultrasound to remove plaque and food debris. Jefferson Dental &amp; Orthodontics recommends <a href="https://www.usa.philips.com/c-m-pe/electric-toothbrushes">Phillips Sonicare</a> as our preferred ultrasonic toothbrush.</span></p>',
                'logo' => 'media/assets/blog/img-6.jpeg',
                'created_at' => now(),
            ],
            [
                'title' => 'Everything You Need to Know About Dental Fillings',
                'subject' => '<h1><span style="">The Importance of Dental Technology&nbsp;&nbsp;</span></h1><p><span style="">Both dentists and patients benefit from dental technology. Thanks to the many advances in dental technology, oral health problems can be detected earlier and treated faster. Today, oral health solutions are more promising than ever.&nbsp;</span></p><h2><span style="">How Dental Technology Improves Oral Health&nbsp;</span></h2><p><span style="">When you visit your dentist office or the dental aisle at your local pharmacy, you may find that dental technology, instruments, and treatment have changed since you were a child. Thanks to modern technologies, dentists can now identify and treat many problems more conveniently and efficiently than traditional methods. Let’s look at some of the ways advances in </span><a href="https://www.jeffersondentalclinics.com/dental-services/dental-technology"><span style="">dental technology</span></a><span style=""> have helped patients at home and in the dental office.</span></p><h3><span style="">Water Flossing</span></h3><p><span style="">As with flossing, water flossing removes the food stuck between your teeth. It also removes bacteria before it hardens into plaque. Plaque can turn into tartar and lead to tooth decay and gum disease. Your toothbrush can’t get into those tiny spaces where plaque forms, making water flossing a great tool to prevent gum disease and bleeding gums.&nbsp;</span></p><p><span style="">The American Dental Association says water flossing with products labeled with the ADA Seal of Acceptance can eliminate plaque.</span></p><h3><span style="">Ultrasonic Toothbrushes</span></h3><p><span style="">Ultrasonic toothbrushes on the market today offer frequencies up to over 50,000 brushes per minute. Ultrasonic toothbrushes clean teeth not through physical movements, but through high-frequency vibrations called ultrasound to remove plaque and food debris. Jefferson Dental &amp; Orthodontics recommends <a href="https://www.usa.philips.com/c-m-pe/electric-toothbrushes">Phillips Sonicare</a> as our preferred ultrasonic toothbrush.</span></p>',
                'logo' => 'media/assets/blog/img-7.jpeg',
                'created_at' => now(),
            ],

        ]);
    }
}
