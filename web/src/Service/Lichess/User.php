<?php

namespace App\Service\Lichess;


class User
{

    public function __construct($data)
    {
        $this->id       = isset($data->id)       ? $data->id       : null;
        $this->username = isset($data->username) ? $data->username : null;
        $this->online   = isset($data->online)   ? $data->online   : null;
        $this->perfs = [];
        if (isset($data->perfs)) {
            foreach ($data->perfs as $key => $value) {
                $this->perfs[$key] = new Performance($value);
            }
        }
        $this->createdAt = isset($data->createdAt) ? $data->createdAt            : null;
        $this->profile   = isset($data->profile)   ? new Profile($data->profile) : null;
        $this->seenAt    = isset($data->seenAt)    ? $data->seenAt               : null;
        $this->patron    = isset($data->patron)    ? $data->patron               : false;
        $this->playTime = [];
        if (isset($data->playTime)) {
            foreach ($data->playTime as $key => $value) {
                $this->playTime[$key] = $value;
            }
        }
        $this->language       = isset($data->language)       ? $data->language       : null;
        $this->url            = isset($data->url)            ? $data->url            : null;
        $this->nbFollowing    = isset($data->nbFollowing)    ? $data->nbFollowing    : null;
        $this->nbFollowers    = isset($data->nbFollowers)    ? $data->nbFollowers    : null;
        $this->completionRate = isset($data->completionRate) ? $data->completionRate : null;
        $this->count = [];
        if (isset($data->count)) {
            foreach ($data->count as $key => $value) {
                $this->count[$key] = $value;
            }
        }
        $this->followable = isset($data->followable) ? $data->followable : false;
        $this->following  = isset($data->following)  ? $data->following  : false;
        $this->blocking   = isset($data->blocking)   ? $data->blocking   : false;
        $this->followsYou = isset($data->followsYou) ? $data->followsYou : false;
    }

    public function getId()
    {
        return $this->id;
    }

}
