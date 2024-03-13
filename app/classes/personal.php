<?php

class personal
{
    public static function get_personel_count(){
        global $db;
        $query = $db->prepare("SELECT COUNT(*) AS count FROM hrEmployee WHERE  activePassive=:aPassive AND recordStatus = 1");
        $query->execute([
            'aPassive' => 'A']);
        $response = $query->fetch(PDO::FETCH_ASSOC);
        //$query->debugDumpParams();damp($query);

        return $response;
    }
    public static function get_avg_priorty(){
        global $db;
        $query = $db->prepare("SELECT AVG(timestampdiff(YEAR, startDate,CURDATE())) AS avg FROM hrEmployee WHERE  activePassive=:aPassive AND recordStatus=1");
        $query->execute([
            'aPassive' => 'A'
        ]);
        $res = $query->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function get_new(){
        global $db;
        $query = $db->prepare("SELECT COUNT(*) AS count FROM hrEmployee  WHERE YEAR(startDate) = YEAR(CURDATE()) AND recordStatus = 1");
        $query->execute();
        $res = $query->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function department($par){
        global $db;
        //  damp($par);
        $query = $db->prepare("SELECT department, COUNT(*) as count FROM hrEmployeeDepartment WHERE positionActivePassive = 'A' AND departmentStatus = 1 GROUP BY department ORDER BY count DESC");
        $query->execute($par);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function get_active_personal(){
        global $db;
        $query = $db->prepare("SELECT hrEmployee.*,hrEmployeeDepartment.* FROM hrEmployee INNER JOIN hrEmployeeDepartment ON hrEmployee.registry = hrEmployeeDepartment.registry  WHERE hrEmployee.activePassive = 'A' AND hrEmployee.recordStatus = 1 AND hrEmployeeDepartment.positionActivePassive = 'A' AND hrEmployeeDepartment.departmentStatus = 1");
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        //$query->debugDumpParams();damp($query);
        return $res;
    }
    public static function get_passive_personal(){
        global $db;
        $query = $db->prepare("SELECT hrEmployee.*,hrEmployeeDepartment.* FROM hrEmployee INNER JOIN hrEmployeeDepartment ON hrEmployee.registry = hrEmployeeDepartment.registry  WHERE hrEmployee.activePassive = 'P' AND hrEmployee.recordStatus = 1 AND hrEmployeeDepartment.positionActivePassive = 'A' AND hrEmployeeDepartment.departmentStatus = 1 ");
        $query->execute();
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function get_personal_info($registry){
        global $db;
        $query = $db-> prepare("SELECT * FROM hrEmployee WHERE registry=:registry AND recordStatus=1");
        $query->execute([
            'registry' => $registry
        ]);
        $res = $query->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function get_education_info($registry){
        global $db;
        $query = $db-> prepare("SELECT * FROM (SELECT hrEmployeeEducation.id as id, hrEmployeeEducation.educationSchool, hrEmployeeEducation.educationDepartment, parameters.educationLevelName, parameters.educationLevelCode FROM hrEmployeeEducation INNER JOIN parameters ON hrEmployeeEducation.educationLevel = parameters.educationLevelCode WHERE registry = :registry AND educationStatus = 1) query1 INNER JOIN (SELECT hrEmployeeEducation.id as id, parameters.educationCompletionName FROM hrEmployeeEducation INNER JOIN parameters ON hrEmployeeEducation.educationCompletion=parameters.educationCompletionCode WHERE registry = :registry AND educationStatus = 1) query2 ON query1.id = query2.id ORDER BY query1.educationLevelCode DESC");
        $query->execute([
            'registry' => $registry
        ]);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function get_lang_info($registry){
        global $db;
        $query = $db-> prepare("SELECT hrEmployeeLanguage.id as id, hrEmployeeLanguage.language, hrEmployeeLanguage.languageOverallLevel, parameters.languageLevelCode, parameters.languageLevelName as languageOverallLevelName FROM hrEmployeeLanguage INNER JOIN parameters ON hrEmployeeLanguage.languageOverallLevel = parameters.languageLevelCode WHERE registry = :registry AND languageStatus = 1 ORDER BY languageOverallLevel DESC");
        $query->execute([
            'registry' => $registry
        ]);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function get_certificate_info($registry){
        global $db;
        $query = $db-> prepare("SELECT * FROM hrEmployeeCertification WHERE registry = :registry AND certificationStatus = 1 ORDER BY id DESC");
        $query->execute([
            'registry' => $registry
        ]);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function get_department_info($registry){
        global $db;
        $query = $db-> prepare("SELECT * FROM hrEmployeeDepartment WHERE departmentStatus = 1 AND registry = :registry ORDER BY positionStartDate DESC");
        $query->execute([
            'registry' => $registry
        ]);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function get_salary_info($registry){
        global $db;
        $query = $db-> prepare("SELECT *, CASE WHEN salaryActivePassive ='A' THEN 'Evet' ELSE 'Hayır' END AS Guncel FROM hrEmployeeSalary WHERE salaryStatus = 1 AND registry = :registry ORDER BY salaryStartDate DESC");
        $query->execute([
            'registry' => $registry
        ]);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function get_family_info($registry){
        global $db;
        $query = $db-> prepare("SELECT * FROM (SELECT hrEmployeeFamilyMember.id as id, parameters.familyMemberRelationshipTypeName, hrEmployeeFamilyMember.familyMemberName, hrEmployeeFamilyMember.familyMemberSurname FROM hrEmployeeFamilyMember INNER JOIN parameters ON hrEmployeeFamilyMember.familyMemberRelationshipType = parameters.familyMemberRelationshipTypeCode WHERE registry = :registry AND familyMemberStatus = 1) query1 INNER JOIN (SELECT parameters.familyBeLiableToLookAfterName, hrEmployeeFamilyMember.id as id2 FROM hrEmployeeFamilyMember INNER JOIN parameters ON hrEmployeeFamilyMember.familyBeLiableToLookAfter=parameters.familyBeLiableToLookAfterCode WHERE registry = :registry AND familyMemberStatus = 1) query2 ON query1.id = query2.id2");
        $query->execute([
            'registry' => $registry
        ]);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function get_contact_info($registry){
        global $db;
        $query = $db-> prepare("SELECT * FROM hrEmployeeContact WHERE registry = :registry AND contactStatus = 1 ORDER BY id DESC");
        $query->execute([
            'registry' => $registry
        ]);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function get_exp_info($registry){
        global $db;
        $query = $db-> prepare("SELECT *, TIMESTAMPDIFF(MONTH, experienceStartDate, experienceEndDate) as Month FROM hrEmployeeExperience WHERE experienceStatus = 1 AND registry = :registry ORDER BY experienceStartDate DESC");
        $query->execute([
            'registry' => $registry
        ]);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function insert_departman($companyid,$departman){
        global $db;
        $query = $db-> prepare("INSERT INTO hrdepartments (department, companyId) VALUES ('".$departman."',".$companyid.")");
        $query ->execute();
        return $query;
    }
    public static function auth_employee($auth){
        global $db;
        $query = $db-> prepare("INSERT INTO auth(userid,companyid,profile) VALUES(:userid,:companyid,1) ");
        $query ->execute($auth);
        return $query;
    }
    public static function insert_departman_title($title,$companyid){
        global $db;
        $query = $db-> prepare("INSERT INTO hrtitles (positionTitle, companyId) VALUES ('".$title."',".$companyid.")");
        $query ->execute();
        return $query;
    }
    public static function get_departman(){
        global $db;
        $query = $db-> prepare("SELECT * FROM `hrdepartments` WHERE companyId=:companyId");
        $query ->execute(['companyId'=>session('company_id')]);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function get_depart_title(){
        global $db;
        $query = $db-> prepare("SELECT * FROM `hrtitles` WHERE companyId=:companyId");
        $query ->execute(['companyId'=>session('company_id')]);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public static function insert_personel($employee){
        global $db;
        $query = $db-> prepare("INSERT INTO hremployee (registry, name, surname, nationality, identityNumber, sex, birthDate, bloodType, maritalStatus, drivingLicense, startDate, numberOfKids,lastUpdateUser,activePassive,recordStatus,militaryStatus,reasonOfQuitting,dateOfMarriage) 
VALUES (:registry, :name, :surname, :nationality, :identityNumber, :sex, :birthDate, :bloodType, :maritalStatus, :drivingLicense, :startDate, :numberOfKids,:lastUpdateUser,'A',1,0,999,:dateOfMarriage)");

        $query ->execute($employee);

        return $query;
    }
    public static function update_personel($personalupdate){
        global $db;
        $query = $db-> prepare("UPDATE hremployee SET name=:name, surname=:surname, nationality=:nationality, identityNumber=:identityNumber, sex=:sex, birthDate=:birthDate, bloodType=:bloodType, maritalStatus=:maritalStatus, dateOfMarriage=:dateOfMarriage, numberOfKids=:numberOfKids, drivingLicense=:drivingLicense, startDate=:startDate, endDate=:endDate, activePassive=:activePassive ,lastUpdateUser=:lastUpdateUser,reasonOfQuitting=:reasonOfQuitting WHERE registry=:registry");
        //damp($query);
        $query->execute($personalupdate);
        return $query;
    }
    public static function insert_personel_depart_title($addtitle){
        global $db;
        $query = $db-> prepare(
            "INSERT INTO hremployeedepartment (registry, department, positionTitle, positionStartDate, 	positionActivePassive	, recordInsertDate, 	recordInsertUser, departmentStatus) 
        VALUES (:registry, :department, :roleId, :startDate, 'A', :date, :lastUpdateUser, 1)");
        $query ->execute($addtitle);
        //$query->debugDumpParams();damp($query);

        return $query;

    }
    public static function insert_personel_education($education){
        global $db;
        $query = $db-> prepare(
            "INSERT INTO  hremployeeeducation (registry, educationLevel,educationSchool,educationFaculty,educationDepartment,educationCompletion,startingDate,completionDate,diplomaGrade,educationStatus) 
                                                 VALUES (:registry, :educationLevel ,:educationSchool,:educationFaculty,:educationDepartment,:educationCompletion,:startingDate,:completionDate,:diplomaGrade,1)");
        $query ->execute($education);
        //$query->debugDumpParams();damp($query);

        return $query;

    }
    public static function insert_personel_language($language){
        global $db;
        $query = $db-> prepare(
            "INSERT INTO  hremployeelanguage (languageStatus,registry, language,languageOverallLevel,languageReadingLevel, languageSpeakingLevel,languageWritingLevel,languageExam,languageExamDate,languageExamResult) 
                                                 VALUES (1,:registry,:language ,:languageOverallLevel,:languageReadingLevel,:languageSpeakingLevel,:languageWritingLevel,:languageExam,:languageExamDate,:languageExamResult)");
        $query ->execute($language);
        return $query;
    }
    public static function insert_personel_certification($insertcertification){
        global $db;
        $query = $db-> prepare(
            "INSERT INTO  hremployeecertification (certificationStatus,registry,certificationIssuer,certificationName,certificationNumber,certificationDate,certificationExpiryDate) 
                                                 VALUES (1,:registry,:certificationIssuer,:certificationName,:certificationNumber,:certificationDate,:certificationExpiryDate)");
        $query ->execute($insertcertification);
        return $query;
    }
    /* public static function insert_personel_internaleducation($internaleducation){
         global $db;
         $query = $db-> prepare(
             "INSERT INTO  hremployeecertification (certificationStatus,registry,certificationIssuer,certificationName,certificationNumber,certificationDate,certificationExpiryDate)
                                                  VALUES (1,:registry,:certificationIssuer,:certificationName,:certificationNumber,:certificationDate,:certificationExpiryDate)");
         $query ->execute($internaleducation);
         return $query;
     }*/
    public static function insert_personel_salary($salary){
        global $db;
        $query = $db-> prepare(
            "INSERT INTO hremployeesalary (  registry, salaryType, salaryPeriod, salaryAmount, salaryCurrency, salaryGrossNet, salaryEndDate, salaryStartDate, recordDeleteUser,salaryStatus,salaryActivePassive)
VALUES ( :registry, :salaryType, :salaryPeriod, :salaryAmount, :salaryCurrency, :salaryGrossNet, :salaryEndDate, :salaryStartDate, :recordDeleteUser,1,'A')");
        $query ->execute($salary);
        return $query;
    }
    public static function insert_personel_family($family){
        global $db;
        $query = $db-> prepare(
            "INSERT INTO hremployeefamilymember(registry, familyMemberRelationshipType, familyMemberName, familyMemberSurname, familyMemberNationality, familyMemberIdentityNumber, familyMemberSex, familyMemberBirthDate, familyBeLiableToLookAfter, familyMemberEducationType, familyMemberEducationCompletion, familyMemberStatus) 
VALUES (:registry, :familyMemberRelationshipType, :familyMemberName, :familyMemberSurname, :familyMemberNationality, :familyMemberIdentityNumber, :familyMemberSex, :familyMemberBirthDate, :familyBeLiableToLookAfter, :familyMemberEducationType, :familyMemberEducationCompletion, 1)");
        $query ->execute($family);
        return $query;
    }
    public static function insert_personel_contact($insertContact){
        global $db;
        $query = $db-> prepare(
            "INSERT INTO hremployeecontact (registry,contactPerson,contactType,contactInfo,recordInsertUser,contactStatus) 
                                                VALUES (:registry,:contactPerson,:contactType,:contactInfo,:recordInsertUser,1)");
        $query ->execute($insertContact);
        return $query;
    }
    public static function insert_personel_experience($insertExternalPosition){
        global $db;
        $query = $db-> prepare(
            "INSERT INTO hremployeeexperience (registry,experienceEmployer,experienceDepartment,experienceTitle,experienceStartDate,experienceEndDate,	experienceStatus)
                                        VALUES (:registry,:experienceEmployer,:experienceDepartment,:experienceTitle,:experienceStartDate,:experienceEndDate,1)");
        $query ->execute($insertExternalPosition);
        return $query;
    }
    public static function delete_general($table,$id){
        global $db;
        $query = $db-> prepare("DELETE FROM ".$table." WHERE id = ".$id);
        $query ->execute();
    }

}