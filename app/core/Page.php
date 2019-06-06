<?php
	/**
	 * 分页类
	 */
	class Page{
		//每页显示个数
		public $pageNum;
		//偏移量
		public $offset;
		//url路径
		public $path;
		//分页区间
		public $between;
		//分页字符串
		public $pageList;
		//当前分页样式
		public $currentStyle;

		public function __construct($configArr=''){
			$this->pageNum = $configArr['page']['pageNum'];
			$this->path = $configArr['webInfo']['host'];
			$this->between = $configArr['page']['between'];
		}
		public function show(){
			echo "我是分页!";
		}


		//获取分页字符串
		public function getPage($page=1,$count=0){
			$this->offset = ($page*$this->pageNum) - $this->pageNum;
			// 1*2 -2
			// print_r($this->offset);
			$pages = ceil($count/$this->pageNum);//ok
			/*
			1.确定当前页(偏移量)

			2.计算结束页 当前页+分页区间-1
			 */
			$start = $page;
			$end = $page + $this->between-1;
			if($end>=$pages){
				$end = $pages;
				$start = $end - $this->between + 1;
			}
			if($start<=0){
				$start=1;
				$end = $this->between;
			}
			if ($pages < $this->between) {
				for($i=1;$i<=$pages;$i++){
					// print_r($i);
					if($page==$i){
						$this->currentStyle = "class='current'";
					}else{
						$this->currentStyle='';
					}
					$this->pageList .= "<a href='".$this->path."?/User/UserManage/page/".$i."'{$this->currentStyle}>".$i."</a>";
				}
				# code...
			}else{
				for($i=$start;$i<=$end;$i++){
					// print_r($i);
					if($page==$i){
						$this->currentStyle = "class='current'";
					}else{
						$this->currentStyle='';
					}
					$this->pageList .= "<a href='".$this->path."?/User/UserManage/page/".$i."'{$this->currentStyle}>".$i."</a>";
				}
			}
			//print_r($this->pageList);
			return $this->pageList;
		}

		// public function Dispage($object){
		// 	//点击页数
		// 	$this->page=!isset($object->appPar['page'])?1:$object->appPar['page'];
		// 	//上一页
		// 	if($object->appPar['page']){
		// 		$this->page = $object ->appPar['page']-1;
		// 		if($this->page<=0){
		// 			$this->page=1;
		// 		}
		// 	}
		// 	//下一页
		// 	if($object->appPar['pagedn']){
		// 		$this->page = $object ->appPar['page']+1;
		// 		if($this->page>=$this->pages){
		// 			$this->page=$this->pages;
		// 		}
		// 	}
		// 	$this->Limit();
		// 	return $this->page;
		// }
	}
?>