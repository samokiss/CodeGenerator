<?php
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\Controller\Web\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\ShowEntity;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Gateways\Domain\SubDomain\EntityNotFoundException;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\EntityDetailResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ShowEntityController extends Controller
{
    public function showEntityAction(int $id): Response
    {
        try {
            $entity = $this->getEntity($id);
            $vm = $this->buildVm($entity);

            return $this->render('', ['vm' => $vm]);
        } catch (EntityNotFoundException $nfe) {
            throw $this->createNotFoundException($id);
        }
    }

    private function getEntity(int $id): EntityDetailResponse
    {
        return $this->get('oc.business_rules.use_cases.domain.sub_domain.get_entity')
            ->execute(
                $this->get('oc.business_rules.requestors.domain.sub_domain.get_entity_request_builder')
                    ->create()
                    ->withEntityId($id)
                    ->build()
            );
    }

    private function buildVm(EntityDetailResponse $entity): ShowEntity
    {
        return
            $this->get('oc.app.view_models.web.domain.sub_domain.show_entity_builder')
                ->create()
                ->withEntityDetail($this->get('oc.app.view_models.web.domain.sub_domain.entity_detail_assembler')->createDetail($entity))
                ->build();
    }
}