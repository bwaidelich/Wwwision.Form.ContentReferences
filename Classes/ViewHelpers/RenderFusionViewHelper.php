<?php
namespace Wwwision\Form\ContentReferences\ViewHelpers;

use Neos\FluidAdaptor\Core\ViewHelper\AbstractViewHelper;
use Neos\Fusion\Core\Runtime;

class RenderFusionViewHelper extends AbstractViewHelper
{
    /**
     * @var boolean
     */
    protected $escapeOutput = false;

    /**
     * @param Runtime $fusionRuntime
     * @param string $path
     * @param array $context Additional context variables to be set.
     * @return string
     */
    public function render(Runtime $fusionRuntime, string $path, array $context = null)
    {
        if ($context !== null) {
            $currentContext = $fusionRuntime->getCurrentContext();
            foreach ($context as $key => $value) {
                $currentContext[$key] = $value;
            }
            $fusionRuntime->pushContextArray($currentContext);
        }
        $output = $fusionRuntime->render($path);
        if ($context !== null) {
            $fusionRuntime->popContext();
        }
        return $output;
    }
}