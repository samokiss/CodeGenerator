<?php
// Auto Generated by OpenClassrooms Code Generator

namespace OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\Controller\Web\Domain\SubDomain;

use OpenClassrooms\CodeGenerator\Tests\Doubles\src\App\ViewModels\Web\Domain\SubDomain\EntityDetail;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Gateways\Domain\SubDomain\EntityNotFoundException;
use OpenClassrooms\CodeGenerator\Tests\Doubles\src\BusinessRules\Responders\Domain\SubDomain\EntityDetailResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class GetEntityController extends Controller
{
    public function getEntityAction(int $id): Response
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
        return $this->get('oc_open_classrooms_code_generator_tests_doubles_src_use_cases_domain_sub_domain_get_entity')
            ->execute(
                $this->get('oc_open_classrooms_code_generator_tests_doubles_src_requestors_domain_sub_domain_get_entity_request_builder')
                    ->create()
                    ->withEntityId($id)
                    ->build()
            );
    }

    private function buildVm(EntityDetailResponse $entity): EntityDetail
    {
        return $this->get('oc_open_classrooms_code_generator_tests_doubles_src_app_view_models_web_domain_sub_domain_entity_detail_assembler')->create($entity);
    }
}
