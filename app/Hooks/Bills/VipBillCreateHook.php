<?php

namespace App\Hooks\Bills;


use Closure;
use DayeBill\BillCore\Application\Services\Bill\Commands\BillCreateCommand;
use DayeBill\BillCore\Application\Services\Contact\Commands\ContactCreateCommand;
use DayeBill\BillCore\Domain\Data\EventData;
use DayeBill\BillCore\Domain\Models\Bill;
use DayeBill\BillCore\Domain\Models\Contact;
use DayeBill\BillCore\Domain\Models\Event;
use Illuminate\Support\Facades\Config;
use RedJasmine\Support\Contracts\UserInterface;
use RedJasmine\Vip\Domain\Exceptions\VipException;
use RedJasmine\Vip\Domain\Repositories\UserVipReadRepositoryInterface;

class VipBillCreateHook
{
    public function __construct(
        protected UserVipReadRepositoryInterface $vipReadRepository
    ) {
    }

    /**
     * @param  BillCreateCommand  $command
     * @param  Closure  $next
     *
     * @return mixed
     * @throws VipException
     */
    public function handle($command, Closure $next) : mixed
    {

        // 验证用户是否为VIP
        if ($this->isVip($command->owner) === false) {
            $count    = 0;
            $maxCount = 0;
            if ($command instanceof BillCreateCommand) {
                $count    = Bill::onlyOwner($command->owner)->count();
                $maxCount = Config::get('bill.user_max_count.bills');
            }
            if ($command instanceof ContactCreateCommand) {
                $count    = Contact::onlyOwner($command->owner)->count();
                $maxCount = Config::get('bill.user_max_count.contacts');
            }

            if ($command instanceof EventData) {
                $count    = Event::onlyOwner($command->owner)->count();
                $maxCount = Config::get('bill.user_max_count.events');
            }

            if ($count >= (int)$maxCount) {
                throw new VipException('创建数量已达上限');
            }

        }

        return $next($command);
    }

    protected function isVip(UserInterface $owner) : bool
    {
        $userVip = $this->vipReadRepository->findVipByOwner($owner, 'bill', 'vip');
        if (!$userVip) {
            return false;
        }

        return true;
    }

}