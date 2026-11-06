# Kávé- és teabolt webshop

## 1. A projekt célja

A projekt célja egy olyan webshop létrehozása, ahol a látogatók kávékat, teákat és kiegészítőket böngészhetnek, kosárba tehetik a kiválasztott termékeket, majd rendelést adhatnak le.

A termékek kategóriákba vannak rendezve (például szemes kávé, őrölt kávé, fekete tea, zöld tea, gyümölcstea, kiegészítők), és származási ország szerint is szűrhetők. A legtöbb termék több kiszerelésben (például 250 g és 1 kg) érhető el.

A regisztrált felhasználók megtekinthetik a korábbi rendeléseiket, az adminisztrátorok pedig kezelhetik a termékkínálatot és a beérkezett rendeléseket.

## 2. A webalkalmazás működése

A webalkalmazás három részből áll: frontendből, backendből és relációs adatbázisból. A frontend HTTP kéréseken keresztül kommunikál a backenddel, az adatok `fetch` segítségével, JSON formátumban érkeznek meg az oldalakra.

A rendszer a következő műveleteket támogatja:

- **GET** – termékek, kategóriák és rendelések lekérése
- **POST** – regisztráció, bejelentkezés, rendelés leadása, új termék felvétele
- **PUT** – termékek adatainak és rendelések státuszának módosítása
- **DELETE** – termékek törlése

### Szerepkörök

| Szerepkör | Jogosultságok |
|---|---|
| Vendég | Termékek böngészése és szűrése, kosár használata |
| Regisztrált felhasználó | Rendelés leadása, saját rendelések megtekintése |
| Admin | Termékek és kiszerelések kezelése, rendelések státuszának módosítása |

### Főbb API-végpontok

| Metódus | Végpont | Leírás | Hozzáférés |
|---|---|---|---|
| POST | `/api/auth/register` | Regisztráció | Vendég |
| POST | `/api/auth/login` | Bejelentkezés | Vendég |
| GET | `/api/products` | Termékek listázása (szűrés kategória és származás szerint, keresés) | Vendég |
| GET | `/api/products/:id` | Egy termék adatai a kiszerelésekkel együtt | Vendég |
| GET | `/api/categories` | Kategóriák lekérése | Vendég |
| GET | `/api/origins` | Származási országok lekérése | Vendég |
| POST | `/api/products` | Új termék felvétele | Admin |
| PUT | `/api/products/:id` | Termék módosítása | Admin |
| DELETE | `/api/products/:id` | Termék törlése | Admin |
| POST | `/api/orders` | Rendelés leadása | Regisztrált felhasználó |
| GET | `/api/orders` | Saját rendelések (adminnak az összes) | Regisztrált felhasználó / Admin |
| PUT | `/api/orders/:id/status` | Rendelés státuszának módosítása | Admin |

## 3. Adatbázis

Az adatbázis szerkezete az elkészített [adatbázisterv](https://dbdiagram.io/d/Kave_teabolt-6aeb16bdf1d298b573605365) alapján kerül kialakításra.

Az adatbázis hét, egymással összekapcsolt táblából áll:

| Tábla | Tartalma | Kapcsolatok |
|---|---|---|
| `users` | felhasználók adatai, hash-elt jelszó, szerepkör | 1:N `orders` |
| `categories` | termékkategóriák | 1:N `products` |
| `origins` | származási országok | 1:N `products` |
| `products` | termékek alapadatai (név, leírás, kép, pörköltségi fok) | N:1 `categories`, N:1 `origins`, 1:N `product_variants` |
| `product_variants` | kiszerelések (például 250 g, 1 kg) ára és készlete | N:1 `products`, 1:N `order_items` |
| `orders` | rendelések fejléce (státusz, szállítási cím, szállítási díj, végösszeg) | N:1 `users`, 1:N `order_items` |
| `order_items` | rendelés tételei (kiszerelés, darabszám, vásárláskori egységár) | N:1 `orders`, N:1 `product_variants` |

Néhány tervezési döntés:

- Az `order_items` tábla teremti meg az N:M kapcsolatot a rendelések és a kiszerelések között.
- A vásárláskori egységár az `order_items` táblában külön eltárolásra kerül, így egy későbbi áremelés nem módosítja a korábbi rendeléseket.
- A kiegészítőknek (például bögre) nincs származási országuk, ezért a `products.origin_id` mező üres lehet.
- A jelszavak csak hash-elve kerülnek tárolásra.

## 4. A webshop fő funkciói

A program egyik fontos feladata, hogy a rendelési folyamat helyesen és biztonságosan működjön.

- **Szűrés és keresés** – a termékek kategória és származási ország szerint szűrhetők, névre pedig kereshetők.
- **Kiszerelések** – egy termékhez több kiszerelés tartozhat, amelyek árát és készletét a rendszer külön tartja nyilván.
- **Kosár** – a vásárló kiválasztja a kiszerelést és a mennyiséget. A kosár tartalma a böngészőben tárolódik a rendelés leadásáig.
- **Készletellenőrzés** – rendeléskor a rendszer ellenőrzi, hogy van-e elegendő készlet, és a sikeres rendelés után csökkenti azt. Ha nincs elég készlet, a program ezt jelzi a felhasználónak.
- **Szállítási költség** – egy meghatározott összeg (például 15 000 Ft) felett a szállítás ingyenes, alatta a rendszer hozzáadja a szállítási díjat a végösszeghez.
- **Árszámítás a szerveren** – a végösszeget a backend számolja ki a rendelés leadásakor, nem a frontendtől kapott adatok alapján.
- **Rendelési státuszok** – a rendelés az `új`, `feldolgozás alatt`, `szállítás alatt` és `teljesítve` állapotokon halad végig, vagy `törölt` lehet. A státuszt az admin módosítja.

## 5. A weboldal

A weboldal felépítése és működése a készített [weboldalterv](https://www.figma.com/design/OymmKtXT0JU5Aq7YFH2gnw/Kave-Teabolt?t=zFqqrGb01lv5R0Gm-0) alapján kerül kialakításra.

A felület célja, hogy a termékek egyszerűen és átláthatóan böngészhetők legyenek, a rendelés leadása pedig néhány lépésben megvalósítható legyen. A weboldal reszponzív: telefonon, tableten és asztali számítógépen egyaránt jól használható, a termékkártyák elrendezése a képernyő méretéhez igazodik.

Az oldalak:

| Oldal | Leírás |
|---|---|
| Főoldal | Kiemelt termékek és kategóriák |
| Termékek | Terméklista szűrőkkel és kereséssel |
| Termékadatlap | Részletes leírás, kiszerelés kiválasztása, kosárba tétel |
| Kosár és pénztár | Tételek módosítása, szállítási cím, összegzés, rendelés leadása |
| Regisztráció / Bejelentkezés | Fiók létrehozása és belépés |
| Rendeléseim | Korábbi rendelések és azok státusza |
| Admin felület | Termékek, kiszerelések és rendelések kezelése |

## 6. Használt technológiák

- **Frontend:** Vue (Vite), Tailwind CSS
- **Backend:** Laravel (PHP), REST API JSON válaszokkal
- **Adatbázis:** MySQL
- **Hitelesítés:** bejelentkezés, hash-elt jelszavak, szerepkör alapú jogosultságkezelés
- **Futtatás:** Docker Compose, `just` parancsok

## 7. A projekt eredménye

A projekt végére egy működő webshop készül, amelyben a felhasználók kávékat és teákat böngészhetnek, szűrhetnek, kosárba tehetnek és megrendelhetnek, az adminisztrátorok pedig kezelhetik a kínálatot és a rendeléseket.

Az adatok összekapcsolt táblákból álló relációs adatbázisban tárolódnak, a frontend és a backend JSON alapú kommunikációt használ, a felület pedig minden eszközön használható.
