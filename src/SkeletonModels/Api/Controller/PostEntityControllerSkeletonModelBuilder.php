<?php

declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\SkeletonModels\Api\Controller;

use OpenClassrooms\CodeGenerator\Entities\Object\FileObject;

interface PostEntityControllerSkeletonModelBuilder
{
    public function create(): PostEntityControllerSkeletonModelBuilder;

    public function withPostEntityControllerFileObject(
        FileObject $postEntityControllerFileObject
    ): PostEntityControllerSkeletonModelBuilder;

    public function withCreateEntityUseCaseFileObject(
        FileObject $createEntityUseCaseFileObject
    ): PostEntityControllerSkeletonModelBuilder;

    public function withCreateEntityUseCaseRequestBuilderFileObject(
        FileObject $createEntityUseCaseRequestBuilderFileObject
    ): PostEntityControllerSkeletonModelBuilder;

    public function withEntityNotFoundExceptionFileObject(
        FileObject $entityNotFoundExceptionFileObject
    ): PostEntityControllerSkeletonModelBuilder;

    public function withEntityUseCaseDetailResponseFileObject(
        FileObject $entityUseCaseDetailResponseFileObject
    ): PostEntityControllerSkeletonModelBuilder;

    public function withEntityViewModelDetailAssemblerFileObject(
        FileObject $entityViewModelDetailAssemblerFileObject
    ): PostEntityControllerSkeletonModelBuilder;

    public function withEntityViewModelDetailFileObject(
        FileObject $entityViewModelDetailFileObject
    ): PostEntityControllerSkeletonModelBuilder;

    public function withPostEntityModelFileObject(
        FileObject $postEntityModelFileObject
    ): PostEntityControllerSkeletonModelBuilder;

    public function withEntityFileObject(FileObject $entityFileObject): PostEntityControllerSkeletonModelBuilder;

    public function build(): PostEntityControllerSkeletonModel;
}
