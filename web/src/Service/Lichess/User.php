<?php

namespace App\Service\Lichess;


class User
{

    public function __construct($data)
    {
        $this->id = $data->id;
        $this->username = $data->username;
        $this->online = $data->online;
        $this->perfs = [];
        foreach ($data->perfs as $key => $value) {
            $this->perfs[$key] = new Performance($value);
        }
        $this->createdAt = $data->createdAt;
        $this->profile = new Profile($data->profile);
        $this->seenAt = $data->seenAt;
        $this->patron = isset($data->patron) ? $data->patron : false;
        $this->playTime = [];
        foreach ($data->playTime as $key => $value) {
            $this->playTime[$key] = $value;
        }
        $this->language = isset($data->language) ? $data->language : null;
        $this->url = $data->url;
        $this->nbFollowing = $data->nbFollowing;
        $this->nbFollowers = $data->nbFollowers;
        $this->completionRate = $data->completionRate;
        $this->count = [];
        foreach ($data->count as $key => $value) {
            $this->count[$key] = $value;
        }
        $this->followable = isset($data->followable) ? $data->followable : false;
        $this->following = isset($data->following) ? $data->following : false;
        $this->blocking = isset($data->blocking) ? $data->blocking : false;
        $this->followsYou = isset($data->followsYou) ? $data->followsYou : false;
    }

    public function getId()
    {
        return $this->id;
    }

}
