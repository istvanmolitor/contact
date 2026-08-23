# Molitor Contact

A Molitor Contact egy egyszerű publikus kapcsolatfelvételi (kontakt) űrlapot ad Laravel alkalmazásokhoz. Tartalmaz:

- Egy `/contact` oldalt űrlappal (név, e-mail, üzenet)
- Egy kontrollert az űrlap megjelenítéséhez és beküldéséhez
- Alapvető validációt a beküldött adatokra

## Előfeltételek

- Laravel alkalmazás
- Egy `theme::` néven regisztrált nézet-névtér (view namespace), amely biztosítja a `theme::layouts.centered` layoutot, valamint egy `ui::` néven regisztrált komponenskészlet (`x-ui::form`, `x-ui::input-field`, `x-ui::email-field`, `x-ui::textarea-field`, `x-ui::submit-button`, `x-ui::success-message`), mert a csomag saját nézete (`resources/views/contact.blade.php`) ezekre épül. Ezt jellemzik a Molitor projekt téma-/UI-csomagjai (pl. `theme` és `blade-ui`); ha ezek nincsenek telepítve, a `contact::layouts.app` nézetet (vagy a `contact.blade.php`-t) publikálás után saját layoutra/komponensekre kell cserélni.

## Telepítés

1) Telepítés Composerrel

Ha önálló csomagként használod:

```
composer require istvanmolitor/contact
```

Monorepo/fejlesztői környezetben (path repository-val) add hozzá a gyökér `composer.json`-hoz:

```json
{
    "require": {
        "istvanmolitor/contact": "*@dev"
    },
    "repositories": [
        {
            "type": "path",
            "url": "packages/contact"
        }
    ]
}
```

2) Autodiscovery

A csomag Laravel Package Discovery-val regisztrálja a szolgáltatót:
- `Molitor\Contact\Providers\ContactServiceProvider`

Ez automatikusan:
- betölti a nézeteket (`resources/views`) a `contact` névtér alatt
- betölti a `web` route-okat (`src/routes/web.php`)

Migráció, config vagy publish tag nincs a csomagban.

## Route-ok

| Metódus | URL | Név | Kontroller |
| --- | --- | --- | --- |
| GET | `/contact` | `contact.index` | `ContactController@index` |
| POST | `/contact` | `contact.submit` | `ContactController@submit` |

A route-ok a `web` middleware csoportban vannak regisztrálva.

## Használat

Az oldal a `contact::contact` nézetet jeleníti meg (`resources/views/contact.blade.php`), amely a `contact::layouts.app` layoutot használja (`@extends('theme::layouts.centered')`).

A `submit` action a következő szabályok szerint validál:

```php
[
    'name' => 'required|string|max:255',
    'email' => 'required|email|max:255',
    'message' => 'required|string|min:10',
]
```

**Fontos:** a `ContactController::submit` jelenleg nem menti adatbázisba és nem küld e-mailt a beküldött üzenetet — csak validál, majd egy `success` flash üzenettel visszairányít. Ha adatmentésre vagy e-mail küldésre van szükség, a `ContactController@submit` metódust kell kiegészíteni (pl. `Mail::send(...)` hívással vagy egy `ContactMessage` modell mentésével), vagy a nézetet/route-ot a saját alkalmazásodban felülírni.

## Licenc

MIT
