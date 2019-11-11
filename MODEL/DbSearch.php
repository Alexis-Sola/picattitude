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

        $sql = 'SELECT * FROM image WHERE';
        $keyvalue = array();

        //$cpt = 1;
        foreach($keywords as $word){
            $sql.= ' users LIKE \'' . $word . '\' OR titre LIKE \''. $word .'\' OR `desc` LIKE \''. $word .'\' OR ';
            //$keyvalue[':word' . $cpt] = $word;
            //$cpt ++;
        }
        $sql .= '1 = 0 ORDER BY ID DESC;';
        $result = $this->db->query($sql)->fetchAll();
        //$query->execute($keyvalue);
        //$result = $query->fetchAll();
        return $result;

    }


}