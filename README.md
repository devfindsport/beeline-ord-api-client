# PHP client for Beeline ORD API


TODO

Если переключится на версию 8.1 и выше, то классы Dto генерируется с readonly параметрами,
но проблема возникает с `\BeelineOrd\Data\Contract\ContractModel` и классами, которые его наследуют,
а именно с `parentContractId`, которые `readonly` но при вызове `\BeelineOrd\Data\Contract\ContractCreateModel::__construct`
происходит ошибка:

```
Cannot modify readonly property BeelineOrd\Data\Contract\ContractCreateModel::$parentContractId
```

Поэтому в коде вручную поправлены `ContractModel` и `ContractCreateModel`.
