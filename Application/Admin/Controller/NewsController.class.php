<?php
namespace Admin\Controller;

use Think\Controller;
use Think\Model;

class NewsController extends Controller {
    /*todo
     *
     * 添加新闻数据验证
     *
     */
    public function add_news(){
        $typeModel = M('news_type');
        $type_list = $typeModel->select();
        if(IS_POST) {
            $model = M('news');
            $data['title'] = I('post.title');
            $data['content'] = I('post.content');
            $data['summary'] = I('post.summary');
            $data['key_words'] = I('post.key_words');
            $data['priority'] = I('post.priority');
            $data['source'] = I('post.source');
            $data['cite'] = I('post.cite');
            $data['is_hot'] = I('post.is_hot');
            $data['type'] = I('post.type');
            $result=$model->add($data);
            if($result) {
                return $this->success("修改成功！", U('Admin/News/news_list'));
            } else {
                return $this->error("修改失败");
            }
        }
        $this->assign('type_list', $type_list);
        $this->display();
    }

    public function edit_news(){
        $typeModel = M('news_type');
        $type_list = $typeModel->select();
        $this->assign('type_list', $type_list);
        $model = M('news');
        $news_id = I('get.id');
        $condition = array(
            'id' => $news_id,
        );
        if(IS_POST) {
            $model = M('news');

            $condition = array(
                'id' => $news_id,
            );

            $data['title'] = I('post.title');
            $data['content'] = I('post.content');
            $data['summary'] = I('post.summary');
            $data['key_words'] = I('post.key_words');
            $data['priority'] = I('post.priority');
            $data['source'] = I('post.source');
            $data['cite'] = I('post.cite');
            $data['is_hot'] = I('post.is_hot');
            $data['type'] = I('post.type');

            $result=$model->where($condition)->save($data);
            if($result) {
                return $this->success("修改成功！", U('Admin/News/news_list'));
            } else {
                return $this->error("修改失败");
            }
        }

        $res = $model->where($condition)->select();
        $this->assign('news_detail', $res);
        $this->display();
    }

    public function edit_index_news(){
        if(IS_POST) {
            $model = M('news');
            $not_hot = '0';
            $news_id = I('post.id');
            $condition = array(
                'id' => $news_id,
            );
            $data['is_hot'] = $not_hot;
            $model->where($condition)->save($data);
            $this->ajaxReturn('success');
        }
        $model = M('news');
        $is_hot = '1';
        $condition = array(
            'is_hot' => $is_hot,
        );
        $res = $model->where($condition)->select();
        $this->assign('hotnews_list', $res);
        $this->display();
    }

    public function news_list(){
        $model = M('news');
        $res = $model->select();
        foreach ($res as $key => $item) {
            $typeModel = M('news_type');
            $condition = array(
                'type_id' => $item['type']
            );
            $type_text = $typeModel->where($condition)->getField("type");
            $res[$key]['type_text'] = $type_text;
        }
        $this->assign('news_list', $res);
        $this->display();
    }
}