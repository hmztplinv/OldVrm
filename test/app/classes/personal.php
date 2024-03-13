<?php

class personal
{
public static function get_personel_count(){
    global $db;
    $query = $db->prepare("SELECT COUNT(*) AS count FROM hrEmployee WHERE activePassive=:aPassive AND recordStatus = 1");
    $query->execute([
        'aPassive' => 'A'
    ]);
    $response = $query->fetch(PDO::FETCH_ASSOC);
    return $response;
}
public static function get_avg_priorty(){
    global $db;
    $query = $db->prepare("SELECT AVG(timestampdiff(YEAR, startDate,CURDATE())) AS avg FROM hrEmployee WHERE activePassive=:aPassive AND recordStatus=1");
    $query->execute([
        'aPassive' => 'A'
    ]);
    $res = $query->fetch(PDO::FETCH_ASSOC);
    return $res;
}
public static function get_new(){
    global $db;
    $query = $db->prepare("SELECT COUNT(*) AS count FROM hrEmployee WHERE YEAR(startDate) = YEAR(CURDATE()) AND recordStatus = 1");
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
    $query = $db->prepare("SELECT * FROM hrEmployee INNER JOIN hrEmployeeDepartment ON hrEmployee.registry = hrEmployeeDepartment.registry WHERE hrEmployee.activePassive = 'A' AND hrEmployee.recordStatus = 1 AND hrEmployeeDepartment.positionActivePassive = 'A' AND hrEmployeeDepartment.departmentStatus = 1 ORDER BY hrEmployee.registry");
    $query->execute();
    $res = $query->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}
    public static function get_passive_personal(){
        global $db;
        $query = $db->prepare("SELECT * FROM hrEmployee INNER JOIN hrEmployeeDepartment ON hrEmployee.registry = hrEmployeeDepartment.registry WHERE hrEmployee.activePassive = 'P' AND hrEmployee.recordStatus = 1 AND hrEmployeeDepartment.positionActivePassive = 'A' AND hrEmployeeDepartment.departmentStatus = 1 ORDER BY hrEmployee.registry");
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
}