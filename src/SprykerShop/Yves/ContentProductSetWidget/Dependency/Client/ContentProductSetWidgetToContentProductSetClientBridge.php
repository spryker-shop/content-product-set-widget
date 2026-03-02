<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\ContentProductSetWidget\Dependency\Client;

use Generated\Shared\Transfer\ContentProductSetTypeTransfer;

class ContentProductSetWidgetToContentProductSetClientBridge implements ContentProductSetWidgetToContentProductSetClientInterface
{
    /**
     * @var \Spryker\Client\ContentProductSet\ContentProductSetClientInterface
     */
    protected $contentProductSetClient;

    /**
     * @param \Spryker\Client\ContentProductSet\ContentProductSetClientInterface $contentProductSetClient
     */
    public function __construct($contentProductSetClient)
    {
        $this->contentProductSetClient = $contentProductSetClient;
    }

    public function executeProductSetTypeByKey(string $contentKey, string $localeName): ?ContentProductSetTypeTransfer
    {
        return $this->contentProductSetClient->executeProductSetTypeByKey($contentKey, $localeName);
    }
}
