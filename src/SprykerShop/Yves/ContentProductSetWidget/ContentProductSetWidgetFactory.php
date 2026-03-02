<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\ContentProductSetWidget;

use Spryker\Shared\Twig\TwigFunctionProvider;
use Spryker\Yves\Kernel\AbstractFactory;
use SprykerShop\Yves\ContentProductSetWidget\Dependency\Client\ContentProductSetWidgetToContentProductSetClientInterface;
use SprykerShop\Yves\ContentProductSetWidget\Dependency\Client\ContentProductSetWidgetToProductSetStorageClientInterface;
use SprykerShop\Yves\ContentProductSetWidget\Dependency\Client\ContentProductSetWidgetToProductStorageClientInterface;
use SprykerShop\Yves\ContentProductSetWidget\Reader\ContentProductAbstractReader;
use SprykerShop\Yves\ContentProductSetWidget\Reader\ContentProductAbstractReaderInterface;
use SprykerShop\Yves\ContentProductSetWidget\Reader\ContentProductSetReader;
use SprykerShop\Yves\ContentProductSetWidget\Reader\ContentProductSetReaderInterface;
use SprykerShop\Yves\ContentProductSetWidget\Twig\ContentProductSetTwigFunctionProvider;
use Twig\Environment;
use Twig\TwigFunction;

class ContentProductSetWidgetFactory extends AbstractFactory
{
    public function createContentProductSetTwigFunctionProvider(
        Environment $twig,
        string $localeName
    ): TwigFunctionProvider {
        return new ContentProductSetTwigFunctionProvider(
            $twig,
            $localeName,
            $this->createContentProductSetReader(),
            $this->createContentProductAbstractReader(),
        );
    }

    public function createContentProductSetTwigFunction(
        Environment $twig,
        string $localeName
    ): TwigFunction {
        $functionProvider = $this->createContentProductSetTwigFunctionProvider($twig, $localeName);

        return new TwigFunction(
            $functionProvider->getFunctionName(),
            $functionProvider->getFunction(),
            $functionProvider->getOptions(),
        );
    }

    public function createContentProductSetReader(): ContentProductSetReaderInterface
    {
        return new ContentProductSetReader(
            $this->getContentProductSetClient(),
            $this->getProductSetStorageClient(),
        );
    }

    public function createContentProductAbstractReader(): ContentProductAbstractReaderInterface
    {
        return new ContentProductAbstractReader(
            $this->getProductStorageClient(),
        );
    }

    public function getContentProductSetClient(): ContentProductSetWidgetToContentProductSetClientInterface
    {
        return $this->getProvidedDependency(ContentProductSetWidgetDependencyProvider::CLIENT_CONTENT_PRODUCT_SET);
    }

    public function getProductSetStorageClient(): ContentProductSetWidgetToProductSetStorageClientInterface
    {
        return $this->getProvidedDependency(ContentProductSetWidgetDependencyProvider::CLIENT_PRODUCT_SET_STORAGE);
    }

    public function getProductStorageClient(): ContentProductSetWidgetToProductStorageClientInterface
    {
        return $this->getProvidedDependency(ContentProductSetWidgetDependencyProvider::CLIENT_PRODUCT_STORAGE);
    }
}
