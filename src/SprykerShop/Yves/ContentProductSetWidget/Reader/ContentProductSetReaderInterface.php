<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\ContentProductSetWidget\Reader;

use Generated\Shared\Transfer\ProductSetDataStorageTransfer;

interface ContentProductSetReaderInterface
{
    public function findProductSet(string $contentKey, string $localeName): ?ProductSetDataStorageTransfer;
}
