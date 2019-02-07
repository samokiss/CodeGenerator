<?php declare(strict_types=1);

namespace OpenClassrooms\CodeGenerator\Utility;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
trait ClassNameUtility
{
    protected function getDomainAndEntityNameFromClassName(string $className): array
    {
        return [$this->getDomainFromClassName($className), $this->getEntityNameFromClassName($className)];
    }

    protected function getDomainFromClassName(string $className): string
    {
        $explodedNamespace = explode('\\', $this->getNamespace($className));

        $domain = [];

        $limit = $this->getNamespaceLimit($explodedNamespace);

        for ($i = count($explodedNamespace) - 1; $i > 0 && $i != $limit; $i--) {
            if (array_search(
                    $explodedNamespace[$i],
                    ['Entities', 'Request', 'Response', 'DTO', 'UseCases', 'Impl']
                ) === false) {
                $domain[] = $explodedNamespace[$i];
            }
        }

        return implode('\\', array_reverse($domain));
    }

    private function getNamespace(string $className)
    {
        $classParts = explode('\\', $className);
        array_pop($classParts);

        return implode('\\', $classParts);
    }

    private function getNamespaceLimit(array $explodedNamespace): int
    {
        foreach (array_reverse($explodedNamespace) as $key => $dir) {
            if ($dir == 'BusinessRules' || $dir == 'Entity' || $dir == 'ViewModels' || $dir == 'Responders') {
                return count($explodedNamespace) - 1 - $key;
            }
        }

        return 0;
    }

    public function getEntityNameFromClassName(string $className): string
    {
        $shortClassName = $this->getShortClassName($className);
        $shortClassName = str_replace('DetailAssembler', '', $shortClassName);
        $shortClassName = str_replace('DetailResponseDTO', '', $shortClassName);
        $shortClassName = str_replace('DetailResponse', '', $shortClassName);
        $shortClassName = str_replace('Detail', '', $shortClassName);
        $shortClassName = str_replace('Edit', '', $shortClassName);
        $shortClassName = str_replace('Impl', '', $shortClassName);
        $shortClassName = str_replace('ListItemAssembler', '', $shortClassName);
        $shortClassName = str_replace('ListItemResponseDTO', '', $shortClassName);
        $shortClassName = str_replace('ListItemResponse', '', $shortClassName);
        $shortClassName = str_replace('ListItem', '', $shortClassName);
        $shortClassName = str_replace('ResponseDTO', '', $shortClassName);
        $shortClassName = str_replace('Response', '', $shortClassName);
        $shortClassName = str_replace('RequestDTO', '', $shortClassName);
        $shortClassName = str_replace('Request', '', $shortClassName);
        $shortClassName = str_replace('Stub1', '', $shortClassName);
        $shortClassName = str_replace('TestCase', '', $shortClassName);

        return $shortClassName;
    }

    protected function getShortClassName(string $className): string
    {
        $classParts = explode('\\', $className);

        return array_pop($classParts);
    }
}
