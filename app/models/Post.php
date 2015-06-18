<?php

class Post extends \Phalcon\Mvc\Model
{

    /**
     *
     * @public integer
     */
    public $name;

    /**
     *
     * @public string
     */
    public $id;

    /**
     *
     * @public string
     */
    public $title;

    /**
     *
     * @public string
     */
    public $content;

    /**
     *
     * @public string
     */
    public $author;

    /**
     *
     * @public string
     */
    public $postType;

    /**
     *
     * @public string
     */
    public $date;

    /**
     *
     * @public double
     */
    public $avg;

    /**
     *
     * @public integer
     */
    public $visits;

    /**
     *
     * @public string
     */
    public $tags;

    /**
     *
     * @public integer
     */
    public $comments;

    /**
     *
     * @public string
     */
    public $thumbnailId;

    /**
     *
     * @public string
     */
    public $thumbnail;

    /**
     *
     * @public string
     */
    public $url;

    /**
     *
     * @public string
     */
    public $program;

    /**
     *
     * @public string
     */
    public $stage;

    /**
     *
     * @public string
     */
    public $embed;

    /**
     *
     * @public string
     */
    public $dest;

    /**
     *
     * @public string
     */
    public $hour;

    /**
     *
     * @public string
     */
    public $promo;

    /**
     *
     * @public string
     */
    public $twWidgetId;

    /**
     *
     * @public string
     */
    public $twitter;

    /**
     *
     * @public string
     */
    public $typePost;

    /**
     *
     * @public string
     */
    public $spotifyUrl;

    /**
     *
     * @public string
     */
    public $stageList;

    /**
     *
     * @public string
     */
    public $notinhome;

    /**
     *
     * @public string
     */
    public $metaFb;

    /**
     *
     * @public string
     */
    public $metaVars;

    /**
     *
     * @public string
     */
    public $metaCss;

    /**
     *
     * @public string
     */
    public $keywords;

    /**
     * Method to set the value of field name
     *
     * @param integer $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field id
     *
     * @param string $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Method to set the value of field content
     *
     * @param string $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Method to set the value of field author
     *
     * @param string $author
     * @return $this
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Method to set the value of field post_type
     *
     * @param string $post_type
     * @return $this
     */
    public function setPostType($post_type)
    {
        $this->post_type = $post_type;

        return $this;
    }

    /**
     * Method to set the value of field date
     *
     * @param string $date
     * @return $this
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Method to set the value of field avg
     *
     * @param double $avg
     * @return $this
     */
    public function setAvg($avg)
    {
        $this->avg = $avg;

        return $this;
    }

    /**
     * Method to set the value of field visits
     *
     * @param integer $visits
     * @return $this
     */
    public function setVisits($visits)
    {
        $this->visits = $visits;

        return $this;
    }

    /**
     * Method to set the value of field tags
     *
     * @param string $tags
     * @return $this
     */
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Method to set the value of field comments
     *
     * @param integer $comments
     * @return $this
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Method to set the value of field thumbnailid
     *
     * @param string $thumbnailId
     * @return $this
     */
    public function setThumbnailId($thumbnailId)
    {
        $this->thumbnailId = $thumbnailId;

        return $this;
    }

    /**
     * Method to set the value of field thumbnail
     *
     * @param string $thumbnail
     * @return $this
     */
    public function setThumbnail($thumbnail)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * Method to set the value of field url
     *
     * @param string $url
     * @return $this
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Method to set the value of field program
     *
     * @param string $program
     * @return $this
     */
    public function setProgram($program)
    {
        $this->program = $program;

        return $this;
    }

    /**
     * Method to set the value of field stage
     *
     * @param string $stage
     * @return $this
     */
    public function setStage($stage)
    {
        $this->stage = $stage;

        return $this;
    }

    /**
     * Method to set the value of field embed
     *
     * @param string $embed
     * @return $this
     */
    public function setEmbed($embed)
    {
        $this->embed = $embed;

        return $this;
    }

    /**
     * Method to set the value of field dest
     *
     * @param string $dest
     * @return $this
     */
    public function setDest($dest)
    {
        $this->dest = $dest;

        return $this;
    }

    /**
     * Method to set the value of field hour
     *
     * @param string $hour
     * @return $this
     */
    public function setHour($hour)
    {
        $this->hour = $hour;

        return $this;
    }

    /**
     * Method to set the value of field promo
     *
     * @param string $promo
     * @return $this
     */
    public function setPromo($promo)
    {
        $this->promo = $promo;

        return $this;
    }

    /**
     * Method to set the value of field tw-widget-id
     *
     * @param string $tw-widget-id
     * @return $this
     */
    public function setTwWidgetId($twWidgetId)
    {
        $this->twWidgetId = $twWidgetId;

        return $this;
    }

    /**
     * Method to set the value of field twitter
     *
     * @param string $twitter
     * @return $this
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Method to set the value of field type_post
     *
     * @param string $typePost
     * @return $this
     */
    public function setTypePost($typePost)
    {
        $this->typePost = $typePost;

        return $this;
    }

    /**
     * Method to set the value of field spotify_url
     *
     * @param string $spotifyUrl
     * @return $this
     */
    public function setSpotifyUrl($spotifyUrl)
    {
        $this->spotifyUrl = $spotifyUrl;

        return $this;
    }

    /**
     * Method to set the value of field stageList
     *
     * @param string $stageList
     * @return $this
     */
    public function setStagelist($stageList)
    {
        $this->stageList = $stageList;

        return $this;
    }

    /**
     * Method to set the value of field notinhome
     *
     * @param string $notinhome
     * @return $this
     */
    public function setNotinhome($notinhome)
    {
        $this->notinhome = $notinhome;

        return $this;
    }

    /**
     * Method to set the value of field meta_fb
     *
     * @param string $metaFb
     * @return $this
     */
    public function setMetaFb($metaFb)
    {
        $this->metaFb = $metaFb;

        return $this;
    }

    /**
     * Method to set the value of field meta_vars
     *
     * @param string $metaVars
     * @return $this
     */
    public function setMetaVars($metaVars)
    {
        $this->metaVars = $metaVars;

        return $this;
    }

    /**
     * Method to set the value of field meta_css
     *
     * @param string $metaCss
     * @return $this
     */
    public function setMetaCss($metaCss)
    {
        $this->metaCss = $metaCss;

        return $this;
    }

    /**
     * Method to set the value of field keywords
     *
     * @param string $keywords
     * @return $this
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Returns the value of field name
     *
     * @return integer
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Returns the value of field content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Returns the value of field author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Returns the value of field post_type
     *
     * @return string
     */
    public function getPostType()
    {
        return $this->post_type;
    }

    /**
     * Returns the value of field date
     *
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Returns the value of field avg
     *
     * @return double
     */
    public function getAvg()
    {
        return $this->avg;
    }

    /**
     * Returns the value of field visits
     *
     * @return integer
     */
    public function getVisits()
    {
        return $this->visits;
    }

    /**
     * Returns the value of field tags
     *
     * @return string
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Returns the value of field comments
     *
     * @return integer
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Returns the value of field thumbnailid
     *
     * @return string
     */
    public function getThumbnailId()
    {
        return $this->thumbnailId;
    }

    /**
     * Returns the value of field thumbnail
     *
     * @return string
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }

    /**
     * Returns the value of field url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Returns the value of field program
     *
     * @return string
     */
    public function getProgram()
    {
        return $this->program;
    }

    /**
     * Returns the value of field stage
     *
     * @return string
     */
    public function getStage()
    {
        return $this->stage;
    }

    /**
     * Returns the value of field embed
     *
     * @return string
     */
    public function getEmbed()
    {
        return $this->embed;
    }

    /**
     * Returns the value of field dest
     *
     * @return string
     */
    public function getDest()
    {
        return $this->dest;
    }

    /**
     * Returns the value of field hour
     *
     * @return string
     */
    public function getHour()
    {
        return $this->hour;
    }

    /**
     * Returns the value of field promo
     *
     * @return string
     */
    public function getPromo()
    {
        return $this->promo;
    }

    /**
     * Returns the value of field tw-widget-id
     *
     * @return string
     */
    public function getTwWidgetId()
    {
        return $this->tw-widget-id;
    }

    /**
     * Returns the value of field twitter
     *
     * @return string
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Returns the value of field type_post
     *
     * @return string
     */
    public function getTypePost()
    {
        return $this->typePost;
    }

    /**
     * Returns the value of field spotify_url
     *
     * @return string
     */
    public function getSpotifyUrl()
    {
        return $this->spotifyUrl;
    }

    /**
     * Returns the value of field stageList
     *
     * @return string
     */
    public function getStagelist()
    {
        return $this->stageList;
    }

    /**
     * Returns the value of field notinhome
     *
     * @return string
     */
    public function getNotinhome()
    {
        return $this->notinhome;
    }

    /**
     * Returns the value of field meta_fb
     *
     * @return string
     */
    public function getMetaFb()
    {
        return $this->metaFb;
    }

    /**
     * Returns the value of field meta_vars
     *
     * @return string
     */
    public function getMetaVars()
    {
        return $this->metaVars;
    }

    /**
     * Returns the value of field meta_css
     *
     * @return string
     */
    public function getMetaCss()
    {
        return $this->metaCss;
    }

    /**
     * Returns the value of field keywords
     *
     * @return string
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'vposts';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Post[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Post
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return array(
            'name' => 'name',
            'id' => 'id',
            'title' => 'title',
            'content' => 'content',
            'author' => 'author',
            'post_type' => 'postType',
            'date' => 'date',
            'avg' => 'avg',
            'visits' => 'visits',
            'tags' => 'tags',
            'comments' => 'comments',
            'thumbnailid' => 'thumbnailId',
            'thumbnail' => 'thumbnail',
            'url' => 'url',
            'program' => 'program',
            'stage' => 'stage',
            'embed' => 'embed',
            'dest' => 'dest',
            'hour' => 'hour',
            'promo' => 'promo',
            'tw-widget-id' => 'twWidgetId',
            'twitter' => 'twitter',
            'type_post' => 'typePost',
            'spotify_url' => 'spotifyUrl',
            'stageList' => 'stageList',
            'notinhome' => 'notinhome',
            'meta_fb' => 'metaFb',
            'meta_vars' => 'metaVars',
            'meta_css' => 'metaCss',
            'keywords' => 'keywords'
        );
    }

}
