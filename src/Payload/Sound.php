<?php

/*
 * This file is part of the Pushok package.
 *
 * (c) Arthur Edamov <edamov@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pushok\Payload;

/**
 * Class Alert
 *
 * @package Pushok\Payload
 *
 * @see http://bit.ly/payload-key-reference
 */
class Sound implements \JsonSerializable
{
    const ALERT_CRITICAL_NAME = 'name';
    const ALERT_CRITICAL_VOLUME = 'volume';
    const ALERT_CRITICAL_CRITICAL = 'critical';

    /**
     * The name of the sound file.
     *
     * @var string
     */
    private $criticalName;

    /**
     * The volume for the critical alert’s sound. Set this to a value between 0.0 (silent) and 1.0 (full volume).
     *
     * @var float
     */
    private $criticalVolume;

    /**
     * The critical alert flag. Set to 1 to enable the critical alert.
     *
     * @var int
     */
    private $criticalCritical;

    protected function __construct()
    {
    }

    public static function create()
    {
        return new self();
    }

    /**
     * Set sound file name.
     *
     * @param string $value
     * @return Sound
     */
    public function setCriticalSoundName(string $value)
    {
        $this->criticalName = $value;

        return $this;
    }

    /**
     * Get sound file name.
     *
     * @return string
     */
    public function getCriticalSoundName()
    {
        return $this->criticalName;
    }

    /**
     * Set sound volume.
     *
     * @param float $value
     * @return Sound
     */
    public function setCriticalSoundVolume(float $value)
    {
        $this->criticalVolume = $value;

        return $this;
    }

    /**
     * Get sound volume.
     *
     * @return float
     */
    public function getCriticalSoundVolume()
    {
        return $this->criticalVolume;
    }

    /**
     * Set critical status.
     *
     * @param int $value
     * @return Sound
     */
    public function setCriticalSoundCritical(int $value)
    {
        $this->criticalCritical = $value;

        return $this;
    }

    /**
     * Get critical alert status.
     *
     * @return int
     */
    public function getCriticalSoundCritical()
    {
        return $this->criticalCritical;
    }

    /**
     * Convert Alert to JSON.
     *
     * @return string
     */
    public function toJson(): string
    {
        return json_encode($this, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Specify data which should be serialized to JSON.
     *
     * @return array
     * @link   http://php.net/manual/en/jsonserializable.jsonserialize.php
     */
    public function jsonSerialize()
    {
        $sound = [];

        if (is_string($this->criticalName)) {
            $sound[self::ALERT_CRITICAL_NAME] = $this->criticalName;
        }

        if (is_float($this->criticalVolume)) {
            $sound[self::ALERT_CRITICAL_VOLUME] = $this->criticalVolume;
        }

        if (is_int($this->criticalCritical)) {
            $sound[self::ALERT_CRITICAL_CRITICAL] = $this->criticalCritical;
        }

        return $sound;
    }
}
