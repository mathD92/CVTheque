<?php

class Model_resume extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->table = "cvt_resume";
    }

    function get_all()
    {
        return $this->db->get($this->table);
    }

    function get_one($id)
    {
        $this->db->select("*")
            ->from($this->table)
            ->where("cvt_users_idcvt_users", $id)
            ->limit(1);
        return $this->db->get();
    }

    function insert1($id ,$genre, $firstName, $lastName, $nationality, $birthDate, $application, $description ,$address, $postCode, $city, $mail, $tel)
    {
        $data = array(
            "resume_sexe" => $genre,
            "resume_firstName" => $firstName,
            "resume_lastName" => $lastName,
            "resume_nationality" => $nationality,
            "resume_birthDate" => $birthDate,
            "resume_posteCible" => $application,
            "resume_describ" => $description,
            "resume_addr" => $address,
            "resume_postCode" => $postCode,
            "resume_city" => $city,
            "resume_mail" => $mail,
            "resume_tel" => $tel,
            "cvt_users_idcvt_users" => $id

        );
        return $this->db->insert($this->table, $data);
    }

    function insert2($address, $postCode, $city, $mail, $tel)
    {
        $data = array(
            "resume_addr" => $address,
            "resume_postCode" => $postCode,
            "resume_city" => $city,
            "resume_mail" => $mail,
            "resume_tel" => $tel
        );
        return $this->db->insert($this->table, $data);
    }

    function update1($id ,$genre, $firstName, $lastName, $nationality, $birthDate, $application, $description ,$address, $postCode, $city, $mail, $tel)
    {
        $data = array(
            "resume_sexe" => $genre,
            "resume_firstName" => $firstName,
            "resume_lastName" => $lastName,
            "resume_nationality" => $nationality,
            "resume_birthDate" => $birthDate,
            "resume_posteCible" => $application,
            "resume_describ" => $description,
             "resume_addr" => $address,
            "resume_postCode" => $postCode,
            "resume_city" => $city,
            "resume_mail" => $mail,
            "resume_tel" => $tel,
            "cvt_users_idcvt_users" => $id
        );
        return $this->db->where("cvt_users_idcvt_users", $id)
            ->update($this->table, $data);
    }

    function update2($id, $address, $postCode, $city, $mail, $tel)
    {
        $data = array(
            "resume_addr" => $address,
            "resume_postCode" => $postCode,
            "resume_city" => $city,
            "resume_mail" => $mail,
            "resume_tel" => $tel,
        );
        return $this->db->where("id, $id")
            ->update($this->table, $data);
    }
    public function view($id)
    {
        $data = $this->Model_resume->get_one($id);

        if ($data->num_rows() > 0) {
            foreach ($data->result() as $row) {
                $result[] = array("id" => intval($row->idcvt_resume),
                    "firstName" => $row->resume_firstName,
                    "lastName" => $row->resume_lastName,
                    "birthDate" => $row->resume_birthDate,
                    "nationality" => $row->resume_nationality,
                    "sexe" => $row->resume_sexe,
                    "addr" => $row->resume_addr,
                    "postCode" => $row->resume_postCode,
                    "city" => $row->resume_city,
                    "tel" => $row->resume_tel,
                    "mail" => $row->resume_mail,
                    "description" => $row->resume_describ,
                    "posteCible" => $row->resume_posteCible,
                    "created" => $row->resume_created,
                    "modified" => $row->resume_modified,
                    "idcvt_users" => $row->cvt_users_idcvt_users,
                    "idtemplatecvuser" => $row->idtemplatecvuser
                );
            }

              return $result;

        } else {
            header("HTTP/1.0 404 Not Found");
            echo json_encode("404 : Product #$id not found");
        }
    }
}