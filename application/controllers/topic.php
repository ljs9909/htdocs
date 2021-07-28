<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Topic extends CI_Controller {

    // 생성자 함수
	function __construct(){
		parent::__construct();
		$this->load->database(); // 데이터베이스를 사용하기 위한 데이터베이스 라이브러리 로드
    	$this->load->model('topic_model'); // topic_model 모델 로드
	}

    function index(){	
    	$this->_head();
        $this->load->view('login');
        $this->load->view('footer');
    }

    // id 값에 따른 쿼리 조회문 출력
    function get($id){
    	$this->_head();

    	$topic = $this->topic_model->get($id); // 모델의 get() 메서드로 id 값을 넘겨준 후, 넘겨 받은 id 값을 이용하여 쿼리 문을 조회하고, 해당 결과 값을 반환하여 $topic에 저장
    	$this->load->helper(array('url','HTML','korean'));
        $this->load->view('main', array('topic'=>$topic));
        $this->load->view('footer'); 
    }

    // 등록 (유효성 체크)
    function add(){
    	$this->_head();

    	$this->load->library('form_validation'); // form_validation 라이브러리 로드

    	$this->form_validation->set_rules('title', 'title', 'required');
    	$this->form_validation->set_rules('description', 'description', 'required');
		
        // 널 값인 경우 false 반환
    	if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('add'); // add 창 리다이렉트
                }
                // true
                else
                {
                    // post 방식으로 title, description에 넣은 데이터를 모델의 add 메소드로 전달후 반환 받은 값을 topic_id 에 저장
                	$topic_id = $this->topic_model->add($this->input->post('title'), $this->input->post('description'));
                	$this->load->helper('url');
                    redirect(base_url().'index.php/topic/get/'.$topic_id); // 해당 url로 리다이렉트
                }
    	$this->load->view('footer');
    }

    // 수정
    function update($id){
        $this->_head();

        $this->load->library('form_validation');

    	$this->form_validation->set_rules('title', 'title', 'required');
    	$this->form_validation->set_rules('description', 'description', 'required');
		
    	if ($this->form_validation->run() == FALSE)
                {
                    $this->load->view('update',array("id"=>$id));
                }
                else
                {
                	$topic_id = $this->topic_model->update($this->input->post('title'), $this->input->post('description'), $id);
                	$this->load->helper('url');
                    redirect(base_url().'index.php/topic/get/'.$topic_id->id);
                }

        $this->load->view('footer');
    }

    // 삭제
    function delete($id){
    	$this->load->view('head');
        $this->topic_model->delete($id);
        $this->load->helper('url');
        redirect(base_url().'index.php/topic/get/1');
        $this->load->view('footer');
    }

    // 뒤로가기
    function back(){
    	$this->load->helper('url');
    	redirect(base_url().'index.php/topic/get/1'); // 해당 url로 리다이렉트
    }

    function _head(){
    	$this->load->view('head');
    	$topics = $this->topic_model->gets(); // topic_model의 gets 메소드를 호출하여 해당 쿼리문을 실행하고 결과값을 topics에 저장
    	$this->load->view('topic_list',array('topics'=>$topics));
    }
}
?>