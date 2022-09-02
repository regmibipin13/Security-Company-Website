<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission' => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role' => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user' => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'name'                         => 'Name',
            'employee_id'                  => 'Employee ID',
            'name_helper'                  => ' ',
            'email'                        => 'Email',
            'email_helper'                 => ' ',
            'email_verified_at'            => 'Email verified at',
            'email_verified_at_helper'     => ' ',
            'password'                     => 'Password',
            'password_helper'              => ' ',
            'roles'                        => 'Roles',
            'roles_helper'                 => ' ',
            'remember_token'               => 'Remember Token',
            'remember_token_helper'        => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'two_factor'                   => 'Two-Factor Auth',
            'two_factor_helper'            => ' ',
            'two_factor_code'              => 'Two-factor code',
            'two_factor_code_helper'       => ' ',
            'two_factor_expires_at'        => 'Two-factor expires at',
            'two_factor_expires_at_helper' => ' ',
        ],
    ],
    'setting' => [
        'title'          => 'Settings',
        'title_singular' => 'Setting',
        'fields'         => [
            'id'                          => 'ID',
            'id_helper'                   => ' ',
            'site_title'                  => 'Site Title',
            'site_title_helper'           => ' ',
            'site_description'            => 'Site Description',
            'site_description_helper'     => ' ',
            'site_logo'                   => 'Site Logo',
            'site_logo_helper'            => ' ',
            'company_full_address'        => 'Company Full Address',
            'company_full_address_helper' => ' ',
            'company_email'               => 'Company Email',
            'company_email_helper'        => ' ',
            'google_map_location'         => 'Google Map Location',
            'google_map_location_helper'  => ' ',
            'support_number'              => 'Support Number',
            'support_number_helper'       => ' ',
            'facebook_link'               => 'Facebook Link',
            'facebook_link_helper'        => ' ',
            'instagram_link'              => 'Instagram Link',
            'instagram_link_helper'       => ' ',
            'twitter_link'                => 'Twitter Link',
            'twitter_link_helper'         => ' ',
            'linkedin_link'               => 'Linkedin Link',
            'linkedin_link_helper'        => ' ',
            'created_at'                  => 'Created at',
            'created_at_helper'           => ' ',
            'updated_at'                  => 'Updated at',
            'updated_at_helper'           => ' ',
            'deleted_at'                  => 'Deleted at',
            'deleted_at_helper'           => ' ',
        ],
    ],
    'website' => [
        'title'          => 'Website',
        'title_singular' => 'Website',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'hero_title'            => 'Hero Title',
            'hero_title_helper'     => ' ',
            'hero_title_2'          => 'Hero Title 2',
            'hero_title_2_helper'   => ' ',
            'hero_text'             => 'Hero Text',
            'hero_text_helper'      => ' ',
            'button_1_title'        => 'Button 1 Title',
            'button_1_title_helper' => ' ',
            'button_1_link'         => 'Button 1 Link',
            'button_1_link_helper'  => ' ',
            'button_2_title'        => 'Button 2 Title',
            'button_2_title_helper' => ' ',
            'button_2_link'         => 'Button 2 Link',
            'button_2_link_helper'  => ' ',
            'hero_image'            => 'Hero Image',
            'hero_image_helper'     => ' ',
            'about_us_text'         => 'About Us Text',
            'about_us_text_helper'  => ' ',
            'about_image'           => 'About Image',
            'about_image_helper'    => ' ',
            'our_team_text'         => 'Our Team Text',
            'our_team_text_helper'  => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
        ],
    ],
    'service' => [
        'title'          => 'Services',
        'title_singular' => 'Service',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'name'                 => 'Name',
            'name_helper'          => ' ',
            'description'          => 'Description',
            'description_helper'   => ' ',
            'intro_text'           => 'Intro Text',
            'intro_text_helper'    => '(this text will be shown as the feature text while showing services)',
            'slug'                 => 'Slug',
            'slug_helper'          => ' ',
            'feature_media'        => 'Feature Media',
            'feature_media_helper' => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'team' => [
        'title'          => 'Teams',
        'title_singular' => 'Team',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'position'          => 'Position',
            'position_helper'   => ' ',
            'image'             => 'Image',
            'image_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'email' => 'Email',
            'phone' => 'Phone',
            'address' => 'Address',
            'started_from' => 'Started Working From',
            'ended_at' => 'Ended Working In',
            'still_working' => 'Still Working Here',
            'father_name' => "Father's Name",
            'grandfather_name' => "Grandfather's name",
        ],
    ],
    'testimonial' => [
        'title'          => 'Testimonials',
        'title_singular' => 'Testimonial',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'profession'        => 'Profession',
            'profession_helper' => ' ',
            'review'            => 'Review',
            'review_helper'     => ' ',
            'photo'             => 'Photo',
            'photo_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'galleryCollection' => [
        'title'          => 'Gallery Collections',
        'title_singular' => 'Gallery Collection',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'collection_name'        => 'Collection Name',
            'collection_name_helper' => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'files'                  => 'Files',
            'files_helper'           => ' ',
        ],
    ],
    'qrGenerate' => [
        'title'          => 'Qr Generate',
        'title_singular' => 'Qr Generate',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'qr_code'           => 'Qr Code',
            'qr_code_helper'    => ' ',
            'qr_photo'          => 'Qr Photo',
            'qr_photo_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'certificate' => [
        'title'          => 'Certificates',
        'title_singular' => 'Certificate',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'qr_code'            => 'Qr Code',
            'qr_code_helper'     => ' ',
            'name'               => 'Certificate Holder Name',
            'name_helper'        => ' ',
            'email'              => 'Certificate Holder Email',
            'email_helper'       => ' ',
            'phone'              => 'Certificate Holder Phone',
            'phone_helper'       => ' ',
            'course'             => 'Course',
            'course_helper'      => ' ',
            'trainer'            => 'Trainer Full Name',
            'trainer_helper'     => ' ',
            'certificate'        => 'Certificate',
            'certificate_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'employeeForm' => [
        'title'          => 'Employee Form',
        'title_singular' => 'Employee Form',
        'fields'         => [
            'id'                        => 'ID',
            'id_helper'                 => ' ',
            'name'                      => 'Name',
            'name_helper'               => ' ',
            'email'                     => 'Email',
            'email_helper'              => ' ',
            'phone'                     => 'Phone',
            'phone_helper'              => ' ',
            'address'                   => 'Address',
            'address_helper'            => ' ',
            'additional_message'        => 'Additional Message',
            'additional_message_helper' => ' ',
            'files'                     => 'Files',
            'files_helper'              => ' ',
            'created_at'                => 'Created at',
            'created_at_helper'         => ' ',
            'updated_at'                => 'Updated at',
            'updated_at_helper'         => ' ',
            'deleted_at'                => 'Deleted at',
            'deleted_at_helper'         => ' ',
            'approved'                  => 'Approved',
            'approved_helper'           => ' ',
        ],
    ],
    'companyForm' => [
        'title'          => 'Company Form',
        'title_singular' => 'Company Form',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'company_name'            => 'Company Name',
            'company_name_helper'     => ' ',
            'company_location'        => 'Company Location',
            'company_location_helper' => ' ',
            'company_contact'         => 'Company Contact',
            'company_contact_helper'  => ' ',
            'name'                    => 'Name',
            'name_helper'             => ' ',
            'email'                   => 'Email',
            'email_helper'            => ' ',
            'contact'                 => 'Contact',
            'contact_helper'          => ' ',
            'subject'                 => 'Subject',
            'subject_helper'          => ' ',
            'message'                 => 'Message',
            'message_helper'          => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
        ],
    ],
    'trainingForm' => [
        'title'          => 'Training Form',
        'title_singular' => 'Training Form',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'email'             => 'Email',
            'email_helper'      => ' ',
            'contact'           => 'Contact',
            'contact_helper'    => ' ',
            'address'           => 'Address',
            'address_helper'    => ' ',
            'type'              => 'Type Of Training',
            'type_helper'       => ' ',
            'files'             => 'Files',
            'files_helper'      => ' ',
            'message'           => 'Message',
            'message_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'employee_reports' => [
        'title'          => 'Employee Reports',
        'title_singular' => 'Employee Reports',
        'fields'         => [
            'id'                => 'ID',
            'employee_id'       => 'Employee ID',
            'date'              => 'Date',
            'time'              => 'Time',
            'operation'         => 'Operation / Rescue',
            'description'       => 'Description',
            'location'       => 'Location',
            'files'             => 'Files',
            'files_helper'      => ' ',
            'message'           => 'Message',
            'message_helper'    => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'marketing' => [
        'title'          => 'Marketing',
        'title_singular' => 'Marketing',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'company_name'                 => 'Company Name',
            'company_name_helper'          => ' ',
            'managing_director'            => 'Managing Director',
            'managing_director_helper'     => ' ',
            'location'                     => 'Location',
            'location_helper'              => ' ',
            'mobile_number'                => 'Mobile Number',
            'mobile_number_helper'         => ' ',
            'telephone_number'             => 'Telephone Number',
            'telephone_number_helper'      => ' ',
            'secondary_cell_number'        => 'Secondary Cell Number',
            'secondary_cell_number_helper' => ' ',
            'comments'                     => 'Comments',
            'comments_helper'              => ' ',
            'email'                        => 'Email',
            'email_helper'                 => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
        ],
    ],
    'trainingAttendance' => [
        'title'          => 'Training Attendances',
        'title_singular' => 'Training Attendance',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'employee'          => 'Employee',
            'employee_helper'   => ' ',
            'date'              => 'Date',
            'date_helper'       => ' ',
            'time'              => 'Time',
            'time_helper'       => ' ',
            'location'          => 'Location',
            'location_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'employeeAttendance' => [
        'title'          => 'Employee Attendance',
        'title_singular' => 'Employee Attendance',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'employee'          => 'Employee',
            'employee_helper'   => ' ',
            'date'              => 'Date',
            'date_helper'       => ' ',
            'time'              => 'Time',
            'time_helper'       => ' ',
            'location'          => 'Location',
            'location_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'satisfaction' => [
        'title'          => 'Satisfaction',
        'title_singular' => 'Satisfaction',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'name'               => 'Name',
            'name_helper'        => ' ',
            'email'              => 'Email',
            'email_helper'       => ' ',
            'is_employee'        => 'Is Employee (Formal/Working)',
            'is_employee_helper' => ' ',
            'employee'           => 'Employee Id',
            'employee_helper'    => ' ',
            'rate'               => 'Rating',
            'rate_helper'        => 'Rate From 1 to 5',
            'description'        => 'Description',
            'description_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
            'approved'           => 'Approved',
            'approved_helper'    => ' ',
        ],
    ],
];
