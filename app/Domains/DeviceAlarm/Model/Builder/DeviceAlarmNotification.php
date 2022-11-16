<?php declare(strict_types=1);

namespace App\Domains\DeviceAlarm\Model\Builder;

use App\Domains\SharedApp\Model\Builder\BuilderAbstract;

class DeviceAlarmNotification extends BuilderAbstract
{
    /**
     * @param int $device_alarm_id
     *
     * @return self
     */
    public function byDeviceAlarmId(int $device_alarm_id): self
    {
        return $this->where('device_alarm_id', $device_alarm_id);
    }

    /**
     * @param int $device_id
     *
     * @return self
     */
    public function byDeviceId(int $device_id): self
    {
        return $this->where('device_id', $device_id);
    }

    /**
     * @param array $device_ids
     *
     * @return self
     */
    public function byDeviceIds(array $device_ids): self
    {
        return $this->whereIntegerInRaw('device_id', $device_ids);
    }

    /**
     * @param bool $closed_at = false
     *
     * @return self
     */
    public function whereClosedAt(bool $closed_at = false): self
    {
        return $this->when(
            $closed_at,
            static fn ($q) => $q->whereNotNull('closed_at'),
            static fn ($q) => $q->whereNull('closed_at')
        );
    }

    /**
     * @return self
     */
    public function withAlarm(): self
    {
        return $this->with('alarm');
    }

    /**
     * @return self
     */
    public function withDevice(): self
    {
        return $this->with('device');
    }

    /**
     * @return self
     */
    public function withPosition(): self
    {
        return $this->with('position');
    }

    /**
     * @return self
     */
    public function withTrip(): self
    {
        return $this->with('trip');
    }
}