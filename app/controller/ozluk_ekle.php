<?php
if (post('insertEducation'))
{
    $education=[
        'educationLevel'=>post('educationLevel'),
        'educationSchool'=>post('educationSchool'),
        'educationFaculty'=>post('educationFaculty'),
        'educationDepartment'=>post('educationDepartment'),
        'educationCompletion'=>post('educationCompletion'),
        'startingDate'=>post('startingDate'),
        'completionDate'=>post('completionDate'),
        'diplomaGrade'=>post('diplomaGrade'),
        'registry'=>post('registry')
    ];

    personal::insert_personel_education($education);
    header('location:'.site_url('personel'));
}
if (post('insertLanguage')){
    $language=[
        'registry'=>post('registry'),
        'language'=>post('language'),
        'languageOverallLevel'=>post('languageOverallLevel'),
        'languageReadingLevel'=>post('languageReadingLevel'),
        'languageSpeakingLevel'=>post('languageSpeakingLevel'),
        'languageWritingLevel'=>post('languageWritingLevel'),
        'languageExam'=>post('languageExam'),
        'languageExamDate'=>post('languageExamDate'),
        'languageExamResult'=>post('languageExamResult')
    ];
    personal::insert_personel_language($language);
    header('location:'.site_url('personel'));
}
if(post('insertCertification')){
    $insertcertification=[
        'registry'=>post('registry'),
        'certificationIssuer'=>post('certificationIssuer'),
        'certificationName'=>post('certificationName'),
        'certificationNumber'=>post('certificationNumber'),
        'certificationDate'=>post('certificationDate'),
        'certificationExpiryDate'=>post('certificationExpiryDate'),
    ];

    personal::insert_personel_certification($insertcertification);
    header('location:'.site_url('personel'));

}
//if (post('insertInternalPosition')){
    //$insertInternalPosition=[
    //    'insertInternalPosition'
  //  ];

//}
if (post('salary')){
    $salary=[
        'registry'=>post('registry'),
        'salaryType'=>post('salaryType'),
        'salaryPeriod'=>post('salaryPeriod'),
        'salaryAmount'=>post('salaryAmount'),
        'salaryCurrency'=>post('salaryCurrency'),
        'salaryGrossNet'=>post('salaryGrossNet'),
        'salaryStartDate'=>post('salaryStartDate'),
        'salaryEndDate'=>post('salaryEndDate'),
        'recordDeleteUser'=>session('user_email'),
    ];

    personal::insert_personel_salary($salary);
    header('location:'.site_url('personel'));
}
if (post('insertFamilyMember')){
    $insertFamilyMember=[
        'registry'=>post('registry'),
        'familyMemberRelationshipType'=>post('familyMemberRelationshipType'),
        'familyMemberName'=>post('familyMemberName'),
        'familyMemberSurname'=>post('familyMemberSurname'),
        'familyMemberNationality'=>post('familyMemberNationality'),
        'familyMemberIdentityNumber'=>post('familyMemberIdentityNumber'),
        'familyMemberSex'=>post('familyMemberSex'),
        'familyMemberBirthDate'=>post('familyMemberBirthDate'),
        'familyBeLiableToLookAfter'=>post('familyBeLiableToLookAfter'),
        'familyMemberEducationType'=>post('familyMemberEducationType'),
        'familyMemberEducationCompletion'=>post('familyMemberEducationCompletion')

    ];

    personal::insert_personel_family($insertFamilyMember);
    header('location:'.site_url('personel'));
}
if (post('insertContact')){
    $insertContact=[
        'registry'=>post('registry'),
        'contactPerson'=>post('contactPerson'),
        'contactType'=>post('contactType'),
        'contactInfo'=>post('contactInfo'),
        'recordInsertUser'=>session('user_email')

    ];

    personal::insert_personel_contact($insertContact);
    header('location:'.site_url('personel'));

}
if (post('insertExternalPosition')){
    $insertExternalPosition=[
        'registry'=>post('registry'),
        'experienceEmployer'=>post('experienceEmployer'),
        'experienceDepartment'=>post('experienceDepartment'),
        'experienceTitle'=>post('experienceTitle'),
        'experienceStartDate'=>post('experienceStartDate'),
        'experienceEndDate'=>post('experienceEndDate')
        ];
    personal::insert_personel_experience($insertExternalPosition);
    header('location:'.site_url('personel'));
}
require view('ozluk_ekle');



