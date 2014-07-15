<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDepartmentList extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Department::truncate();
		Department::create(array('system_id'=>1001, 'department_name' => '中國文學系'));
		Department::create(array('system_id'=>1002, 'department_name' => '英美語文學系'));
		Department::create(array('system_id'=>1003, 'department_name' => '法國語文學系'));
		Department::create(array('system_id'=>1099, 'department_name' => '外國語文學系'));
		Department::create(array('system_id'=>1204, 'department_name' => '哲學研究所'));
		Department::create(array('system_id'=>1205, 'department_name' => '歷史研究所'));
		Department::create(array('system_id'=>1206, 'department_name' => '藝術學研究所'));
		Department::create(array('system_id'=>1207, 'department_name' => '學習與教學研究所'));
		Department::create(array('system_id'=>1208, 'department_name' => '戲曲研究所'));
		Department::create(array('system_id'=>1209, 'department_name' => '亞際文化研究國際碩士學位學程'));

		Department::create(array('system_id'=>2001, 'department_name' => '數學系'));
		Department::create(array('system_id'=>2002, 'department_name' => '物理學系'));
		Department::create(array('system_id'=>2003, 'department_name' => '化學學系'));
		Department::create(array('system_id'=>2006, 'department_name' => '光電科學與工程學系'));
		Department::create(array('system_id'=>2008, 'department_name' => '理學院學士班'));
		Department::create(array('system_id'=>2205, 'department_name' => '統計研究所'));
		Department::create(array('system_id'=>2207, 'department_name' => '認知與神經科學研究所'));
		Department::create(array('system_id'=>2209, 'department_name' => '天文研究所'));
		Department::create(array('system_id'=>2210, 'department_name' => '生物物理研究所'));
		Department::create(array('system_id'=>2211, 'department_name' => '生物資訊與系統生物研究所'));
		Department::create(array('system_id'=>2212, 'department_name' => '照明與顯示科技研究所'));
		Department::create(array('system_id'=>2213, 'department_name' => '系統生物與生物資訊研究所'));
		Department::create(array('system_id'=>2215, 'department_name' => '認知神經科學研究所'));
		Department::create(array('system_id'=>2297, 'department_name' => '地球物理研究所'));
		Department::create(array('system_id'=>2298, 'department_name' => '物理與天文研究所'));

		Department::create(array('system_id'=>3002, 'department_name' => '土木工程學系'));
		Department::create(array('system_id'=>3003, 'department_name' => '機械工程學系'));
		Department::create(array('system_id'=>3004, 'department_name' => '化學工程與材料工程學系'));
		Department::create(array('system_id'=>3205, 'department_name' => '營建管理研究所'));
		Department::create(array('system_id'=>3206, 'department_name' => '環境工程研究所'));
		Department::create(array('system_id'=>3207, 'department_name' => '光機電工程研究所'));
		Department::create(array('system_id'=>3208, 'department_name' => '能源工程研究所'));
		Department::create(array('system_id'=>3209, 'department_name' => '材料科學與工程研究所'));
		Department::create(array('system_id'=>3211, 'department_name' => '生物醫學工程研究所'));
		Department::create(array('system_id'=>3310, 'department_name' => '國際永續發展碩士在職專班'));

		Department::create(array('system_id'=>4001, 'department_name' => '企業管理學系'));
		Department::create(array('system_id'=>4003, 'department_name' => '資訊管理學系'));
		Department::create(array('system_id'=>4008, 'department_name' => '財務金融學系'));
		Department::create(array('system_id'=>4009, 'department_name' => '經濟學系'));
		Department::create(array('system_id'=>4206, 'department_name' => '工業管理研究所'));
		Department::create(array('system_id'=>4207, 'department_name' => '人力資源管理研究所'));
		Department::create(array('system_id'=>4210, 'department_name' => '會計研究所'));
		Department::create(array('system_id'=>4211, 'department_name' => '英語商業管理碩士學位學程'));
		Department::create(array('system_id'=>4300, 'department_name' => '管理學院高階主管企管碩士班'));

		Department::create(array('system_id'=>5001, 'department_name' => '電機工程學系'));
		Department::create(array('system_id'=>5002, 'department_name' => '資訊工程學系'));
		Department::create(array('system_id'=>5003, 'department_name' => '通訊工程學系'));
		Department::create(array('system_id'=>5204, 'department_name' => '網路學習科技研究所'));
		Department::create(array('system_id'=>5205, 'department_name' => '軟體工程研究所'));

		Department::create(array('system_id'=>2096, 'department_name' => '地球科學學系'));
		Department::create(array('system_id'=>6001, 'department_name' => '大氣科學學系'));
		Department::create(array('system_id'=>6201, 'department_name' => '大氣物理研究所'));
		Department::create(array('system_id'=>6203, 'department_name' => '太空科學研究所'));
		Department::create(array('system_id'=>6204, 'department_name' => '應用地質研究所'));
		Department::create(array('system_id'=>6205, 'department_name' => '水文科學研究所'));
		Department::create(array('system_id'=>6206, 'department_name' => '水文與海洋科學研究所'));

		Department::create(array('system_id'=>7007, 'department_name' => '客家語文暨社會科學學系'));
		Department::create(array('system_id'=>7201, 'department_name' => '客家社會文化研究所'));
		Department::create(array('system_id'=>7202, 'department_name' => '客家語文研究所'));
		Department::create(array('system_id'=>7203, 'department_name' => '客家政治經濟研究所'));
		Department::create(array('system_id'=>7204, 'department_name' => '法律與政府研究所'));
		Department::create(array('system_id'=>7601, 'department_name' => '公共事務與族群研究博士學位學程'));

		Department::create(array('system_id'=>8001, 'department_name' => '生命科學系'));
		Department::create(array('system_id'=>8409, 'department_name' => '跨領域神經科學博士學程'));

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Department::truncate();
	}

}
