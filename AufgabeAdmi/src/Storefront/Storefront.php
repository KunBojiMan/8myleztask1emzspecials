<?php declare(strict_types=1);

namespace AufgabeAdmi\Storefront;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityCollection;
use Shopware\Storefront\Page\GenericPageLoadedEvent;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Shopware\Storefront\Page\Product\ProductPageLoadedEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Shopware\Storefront\Page\LandingPage\LandingPageLoadedEvent;
use Shopware\Storefront\Pagelet\Footer\FooterPageletLoadedEvent;
use AufgabeAdmi\Core\Content\AdmiCollection;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;


class Storefront implements EventSubscriberInterface
{
    /*
     * @var SystemConfigService
     */
    private $systemConfigService;

    /*
     * @var EntityRepositoryInterface
     */
    private $shopFinderRepository;

    public function __construct(
        SystemConfigService $systemConfigService,
        EntityRepositoryInterface $shopFinderRepository
    ) {
        $this->systemConfigService = $systemConfigService;
        $this->shopFinderRepository = $shopFinderRepository;
    }

    public static function getSubscribedEvents()
    {
        return [
            GenericPageLoadedEvent::class => 'onSectionPageletLoaded'
        ];
    }

    public function onSectionPageletLoaded(GenericPageLoadedEvent $event): void
    {
        if (!$this->systemConfigService->get('AdmiCollection.config.showInStorefront')) {
            return;
        }

        $shops = $this->fetchShop($event->getContext());

        $event->getPage()->addExtension('aufgabe_admi', $shops);
    }

    private function fetchShop(Context $context): EntityCollection
    {
        $criteria = new Criteria();
        $criteria->addAssociation('country');
        $criteria->addFilter(new EqualsFilter('active', '1'));
        $criteria->setLimit(4);

        return $this->shopFinderRepository->search($criteria, $context)->getEntities();
    }
}