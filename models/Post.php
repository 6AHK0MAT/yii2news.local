<?php

namespace app\models;
use yii\db\ActiveRecord;

/**
 * Description of Post
 *
 * @author Andrey
 */
class Post extends ActiveRecord{
    
    public static function tableName() {
        return 'post';
    }
    
}
