<?php
/**
 * @property CI_Loader $load
 * @property CI_Session $session
 * @property CI_Input $input
 * @property CI_Output $output
 * @property CI_Email $email
 * @property CI_Form_validation $form_validation
 * @property CI_URI $uri
 * @property Firephp $firephp
 * @property ADOConnection $adodb
 */
class AHP_model extends CI_Model
{
	
	var $table = 'user';
	
	function getJenisKosan(){
		$query = $this->db->query("select * from jenis_kosan");
		return $query;	
	}
	
	function getAreaKosan(){
		$query = $this->db->query("select * from area");
		return $query;	
	}
	
	function getKosanFilterFromDB($data_jenis_kosan,$data_area_kosan) {
		//menentukan type kosan
			$first_query = $this->db->query("select * from type_kosan
			INNER JOIN view_kosan_price
			WHERE type_kosan.id_area = '$data_area_kosan' AND type_kosan.id_jenis = '$data_jenis_kosan'
			AND type_kosan.ID_TYPE = view_kosan_price.id_type");
		
		return $first_query->result();
	}
	
	function getAllCriteriasFromDB() {
		//select semua kriteria berbobot di tabel CriteriaWeight
		$query = $this->db->query("select * from criteria 
		INNER JOIN criteriaweight WHERE criteria.CRITERIA_ID = criteriaweight.CRITERIA_ID");
		return $query;
	}
	
	function checkSlctCriterias($slctdCriterias){
		if(count($slctdCriterias) > 2){
			return true;
		}else{
			return false;
		}
	}
	
	function setComparisonPriority($inpPriorityVal,$slctdCriteria) {
		$p=0;
		$maxCriteria=count($slctdCriteria);
		for ($i=1;$i<=$maxCriteria;$i++){
			for ($j=1;$j<=$maxCriteria;$j++){
				if ($i==$j){
					$matriksCmprsn[$i][$j]=1;		
				}elseif($i>$j){
					$matriksCmprsn[$i][$j]=1/$matriksCmprsn[$j][$i];
				}else{
					$matriksCmprsn[$i][$j]=$inpPriorityVal[$p];
					$p++;
				}
			}
		}
	return $matriksCmprsn;
	}
	
	
	function calcPriorityAllCriteria($matriksCmprsn,$slctdCriteria) {
		$maxCriteria=count($slctdCriteria);
		//menjumlahkan matriks comparison per baris
		for ($kolom=1;$kolom<=$maxCriteria;$kolom++){
			$jmlMatCmprsn[$kolom]=0;
			for ($baris=1;$baris<=$maxCriteria;$baris++){
				$jmlMatCmprsn[$kolom]=$jmlMatCmprsn[$kolom]+$matriksCmprsn[$baris][$kolom];
				
			}
		}
		//menghitung prioritas
		for ($baris=1;$baris<=$maxCriteria;$baris++){
			$priorityCriterias[$baris]=0;
			for ($kolom=1;$kolom<=$maxCriteria;$kolom++){
				$priorityCriterias[$baris]+=$matriksCmprsn[$baris][$kolom]/$jmlMatCmprsn[$kolom];
			}
			$priorityCriterias[$baris]=round($priorityCriterias[$baris]/$maxCriteria,3);
		}
	return $priorityCriterias;
	}
	
	
	
	function calcConsistencyRatio($priorityCriterias,$matriksCmprsn,$slctdCriteria){
		$indexRandom=array(0,0,0.58,0.9,1.12,1.24);
		$result=0;
		$maxCriteria=count($slctdCriteria);
		//mengkalikan setiap elemen dari matriksCmprsn dengan priorityCriterias
		for ($baris=1;$baris<=$maxCriteria;$baris++){
			$matTotalPerBaris[$baris]=0;
			for($kolom=1;$kolom<=$maxCriteria;$kolom++){
				$matTotalPerBaris[$baris]+=$matriksCmprsn[$baris][$kolom]*$priorityCriterias[$kolom];				
			}
			$result+=$matTotalPerBaris[$baris]+$priorityCriterias[$baris];
		}
		$consIndex=(($result/$maxCriteria)-$maxCriteria)/$maxCriteria;
		//menghitung dan periksa consistency ratio
		if (($consIndex/$indexRandom[$maxCriteria-1]) <= 0.1){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	
	function getDataReviewFromDB($slctdKosan,$slctdCriteria){
		//mengambil nilai data review dari setiap mobil dari database
		$this->db->select("low_value");
		$this->db->from("criteriaweight_typekosan A");
		$this->db->join("criteria C","A.CRITERIA_ID = C.CRITERIA_ID");
		$this->db->join("nilai_prioritas N","N.ID_PRIORITAS = A.ID_PRIORITAS ");
		$this->db->where_in("ID_TYPE",$slctdKosan);
		$this->db->where("CRITERIA_NAME",$slctdCriteria);
		$rsltQuery=$this->db->get();
		$dataReview=$rsltQuery->result_array();
	return $dataReview;
	}
	
	function calcPrioritySubCriteria($slctdCriteria,$slctdKosan,$dataReview){
		$maxCar=count($slctdKosan);
		//matriks pairwaise comparison
		for ($baris=0;$baris<$maxCar;$baris++){
			for ($kolom=0;$kolom<$maxCar;$kolom++){
				$matriksCmprsn[$baris][$kolom]=(int)$dataReview[$baris]['low_value']/(int)$dataReview[$kolom]['low_value'];
			}
		}
		
		//menjumlahkan tiap baris pada matriks pairwise comparison
		for ($kolom=0;$kolom<$maxCar;$kolom++){
			$jmlMatCmprsn[$kolom]=0;
			for ($baris=0;$baris<$maxCar;$baris++){
				$jmlMatCmprsn[$kolom]+=$matriksCmprsn[$baris][$kolom];
			}
		}
		
		//menghitung prioritas per mobil yang dipilih
		for ($baris=0;$baris<$maxCar;$baris++){
			$priorityCars[$baris]=0;
			for ($kolom=0;$kolom<$maxCar;$kolom++){
				$priorityCars[$baris]+=$matriksCmprsn[$baris][$kolom]/$jmlMatCmprsn[$kolom];
			}
			$priorityCars[$baris]=$priorityCars[$baris]/$maxCar;
		}
		//membagi setiap prioritas mobil dengan maksimal nilai dari prioritas mobil
		$maxPriority= max($priorityCars);
		for ($baris=0;$baris<$maxCar;$baris++){
			$subPriorityCars[$slctdKosan[$baris]]=round(($priorityCars[$baris]/$maxPriority),3);
		}
	return $subPriorityCars;
	}
	
	function calcRangkingAlternatifKosan($priorityCriterias,$slctdKosan,$prioritySubCriterias){
		$maxKosan=count($slctdKosan);
		$maxCriteria=count($priorityCriterias);
		for ($baris=0;$baris<$maxKosan;$baris++){
			$carsRangking['allCriteria'][$slctdKosan[$baris]]=0;
			for ($kolom=0;$kolom<$maxCriteria;$kolom++){
				
				$carsRangking['subCriteria'][$kolom][$slctdKosan[$baris]]=round(($prioritySubCriterias[$kolom][$slctdKosan[$baris]]*$priorityCriterias[$kolom+1]),3);
				$carsRangking['allCriteria'][$slctdKosan[$baris]]+=round(($prioritySubCriterias[$kolom][$slctdKosan[$baris]]*$priorityCriterias[$kolom+1]),3);
			}
		}
	return $carsRangking;
	}
	
	function getKosanName($slctdKosan){
		foreach($slctdKosan as $kosan){
			$query = $this->db->query("select * from type_kosan where ID_TYPE = '$kosan'");
			$kosanName[$kosan]=$query->result_array();
			$kosanName[$kosan]['name']=implode(" ",$kosanName[$kosan][0]);
		}
	return $kosanName;
	}
}
?>