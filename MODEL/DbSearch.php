<?php


class DbSearch
{
    private $db;

    /**
     * DbUsers constructor.
     * @param $db
     */

    public function __construct($db)
    {
        $this->db = $db;
    }

    private function extract_words($string)
    {
        $cpt = 0;
        $lenstring = strlen($string);
        $unMot = '%';
        $mots_cles = [];

        for ($i = 0; $i < $lenstring; $i++) {

            if ($string[$i] == ' ') {
                $unMot .= '%';
                $mots_cles[$cpt] = $unMot;
                $unMot = '%';
                $cpt++;

            } else {
                $unMot .= $string[$i];
            }
        }
        $unMot .= '%';
        $mots_cles[$cpt] = $unMot;
        return $mots_cles;
    }

    public function search_by_keyword($string){

        $keywords = $this->extract_words($string);

        $sql = 'SELECT * FROM picture WHERE';
        $cpt = 0;
        foreach($keywords as $word){
            $cpt++;
            $sql.= ' pseudo LIKE :word' . $cpt . ' OR title LIKE :word'. $cpt .' OR `description` LIKE :word'. $cpt .' OR ';

        }
        $sql .= '1 = 0 ORDER BY id_picture DESC;';
        $query = $this->db->prepare($sql);

        $tab_asso = array();
        $cpt = 0;
        foreach($keywords as $word) {
            $cpt++;
            $tab_asso[':word'. $cpt . ''] =  $word;
        }

        $query->execute($tab_asso);
        $result = $query->fetchAll();

        //$result = $this->db->query($sql)->fetchAll();
        return $result;
    }


}