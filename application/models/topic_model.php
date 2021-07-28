<?php
class Topic_model extends CI_Model {
	function __construct(){
		parent:: __construct();
	}

	public function gets(){
		return $this->db->query('SELECT * FROM topic')->result();
	}

	public function get($topic_id){
		$this -> db->select('id');  // id 조회
		$this -> db->select('title'); // title 조회
		$this -> db->select('description'); // description 조회
		$this -> db->select('UNIX_TIMESTAMP(created) AS created'); // 생성 날짜 조회
		return $this->db->get_where('topic',array('id'=>$topic_id))->row(); // topic 테이블에서 id가 매개변수로 전달 받은 id값과 동일한 행을 조회
	}

	// 등록
	public function add($title, $description){
		$this->db->set('created','NOW()',false); // 생성 날짜를 현재 시간으로 설정
		$this->db->insert('topic',array(
			'title'=>$title,
			'description'=>$description
		));
		return $this->db->insert_id(); // 추가한 데이터베이스의 id 값을 반환
	}

	// 수정
	public function update($title,$description,$id){

		$data  =  array('title'=> $title, 'description'=>$description);
		$where  =  "id = $id" ;

		$this->db->update('topic', $data, $where);
		return $this->db->get_where('topic',array('id'=>$id))->row();
	}

	// 삭제
	public function delete($id){
		$this->db->where('id', $id)->delete('topic');
	}
}