<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('sk', array (
  'validators' => 
  array (
    'This value should be false.' => 'Táto hodnota by mala byť nastavená na false.',
    'This value should be true.' => 'Táto hodnota by mala byť nastavená na true.',
    'This value should be of type {{ type }}.' => 'Táto hodnota by mala byť typu {{ type }}.',
    'This value should be blank.' => 'Táto hodnota by mala byť prázdna.',
    'The value you selected is not a valid choice.' => 'Táto hodnota by mala byť jednou z poskytnutých možností.',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => 'Mali by ste vybrať minimálne {{ limit }} možnosť.|Mali by ste vybrať minimálne {{ limit }} možnosti.|Mali by ste vybrať minimálne {{ limit }} možností.',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => 'Mali by ste vybrať najviac {{ limit }} možnosť.|Mali by ste vybrať najviac {{ limit }} možnosti.|Mali by ste vybrať najviac {{ limit }} možností.',
    'One or more of the given values is invalid.' => 'Niektoré z uvedených hodnôt sú neplatné.',
    'This field was not expected.' => 'Toto pole sa neočakáva.',
    'This field is missing.' => 'Toto pole chýba.',
    'This value is not a valid date.' => 'Tato hodnota nemá platný formát dátumu.',
    'This value is not a valid datetime.' => 'Táto hodnota nemá platný formát dátumu a času.',
    'This value is not a valid email address.' => 'Táto hodnota nie je platná emailová adresa.',
    'The file could not be found.' => 'Súbor sa nenašiel.',
    'The file is not readable.' => 'Súbor nie je čitateľný.',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Súbor je príliš veľký ({{ size }} {{ suffix }}). Maximálna povolená veľkosť je {{ limit }} {{ suffix }}.',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => 'Súbor typu ({{ type }}) nie je podporovaný. Podporované typy sú {{ types }}.',
    'This value should be {{ limit }} or less.' => 'Táto hodnota by mala byť {{ limit }} alebo menej.',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => 'Táto hodnota obsahuje viac znakov ako je povolené. Mala by obsahovať najviac {{ limit }} znak.|Táto hodnota obsahuje viac znakov ako je povolené. Mala by obsahovať najviac {{ limit }} znaky.|Táto hodnota obsahuje viac znakov ako je povolené. Mala by obsahovať najviac {{ limit }} znakov.',
    'This value should be {{ limit }} or more.' => 'Táto hodnota by mala byť viac ako {{ limit }}.',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => 'Táto hodnota je príliš krátka. Musí obsahovať minimálne {{ limit }} znak.|Táto hodnota je príliš krátka. Musí obsahovať minimálne {{ limit }} znaky.|Táto hodnota je príliš krátka. Minimálny počet znakov je {{ limit }}.',
    'This value should not be blank.' => 'Táto hodnota by mala byť vyplnená.',
    'This value should not be null.' => 'Táto hodnota by nemala byť null.',
    'This value should be null.' => 'Táto hodnota by mala byť null.',
    'This value is not valid.' => 'Táto hodnota nie je platná.',
    'This value is not a valid time.' => 'Tato hodnota nemá správny formát času.',
    'This value is not a valid URL.' => 'Táto hodnota nie je platnou URL adresou.',
    'The two values should be equal.' => 'Tieto dve hodnoty by mali byť rovnaké.',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => 'Súbor je príliš veľký. Maximálna povolená veľkosť je {{ limit }} {{ suffix }}.',
    'The file is too large.' => 'Súbor je príliš veľký.',
    'The file could not be uploaded.' => 'Súbor sa nepodarilo nahrať.',
    'This value should be a valid number.' => 'Táto hodnota by mala byť číslo.',
    'This file is not a valid image.' => 'Tento súbor nie je obrázok.',
    'This is not a valid IP address.' => 'Táto hodnota nie je platná IP adresa.',
    'This value is not a valid language.' => 'Tento jazyk neexistuje.',
    'This value is not a valid locale.' => 'Táto lokalizácia neexistuje.',
    'This value is not a valid country.' => 'Táto krajina neexistuje.',
    'This value is already used.' => 'Táto hodnota sa už používa.',
    'The size of the image could not be detected.' => 'Nepodarilo sa zistiť rozmery obrázku.',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => 'Obrázok je príliš široký ({{ width }}px). Maximálna povolená šírka obrázku je {{ max_width }}px.',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => 'Obrázok je príliš úzky ({{ width }}px). Minimálna šírka obrázku by mala byť {{ min_width }}px.',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => '>Obrázok je príliš vysoký ({{ height }}px). Maximálna povolená výška obrázku je {{ max_height }}px.',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => 'Obrázok je príliš nízky ({{ height }}px). Minimálna výška obrázku by mala byť {{ min_height }}px.',
    'This value should be the user\'s current password.' => 'Táto hodnota by mala byť aktuálne heslo používateľa.',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => 'Táto hodnota by mala mať presne {{ limit }} znak.|Táto hodnota by mala mať presne {{ limit }} znaky.|Táto hodnota by mala mať presne {{ limit }} znakov.',
    'The file was only partially uploaded.' => 'Bola nahraná len časť súboru.',
    'No file was uploaded.' => 'Žiadny súbor nebol nahraný.',
    'No temporary folder was configured in php.ini.' => 'V php.ini nie je nastavený žiadny dočasný adresár, alebo nastavený adresár neexistuje.',
    'Cannot write temporary file to disk.' => 'Dočasný súbor sa nepodarilo zapísať na disk.',
    'A PHP extension caused the upload to fail.' => 'Rozšírenie PHP zabránilo nahraniu súboru.',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => 'Táto kolekcia by mala obsahovať aspoň {{ limit }} prvok alebo viac.|Táto kolekcia by mala obsahovať aspoň {{ limit }} prvky alebo viac.|Táto kolekcia by mala obsahovať aspoň {{ limit }} prvkov alebo viac.',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => 'Táto kolekcia by mala maximálne {{ limit }} prvok.|Táto kolekcia by mala obsahovať maximálne {{ limit }} prvky.|Táto kolekcia by mala obsahovať maximálne {{ limit }} prvkov.',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => 'Táto kolekcia by mala obsahovať presne {{ limit }} prvok.|Táto kolekcia by mala obsahovať presne {{ limit }} prvky.|Táto kolekcia by mala obsahovať presne {{ limit }} prvkov.',
    'Invalid card number.' => 'Neplatné číslo karty.',
    'Unsupported card type or invalid card number.' => 'Nepodporovaný typ karty alebo neplatné číslo karty.',
    'This is not a valid International Bank Account Number (IBAN).' => 'Táto hodnota nie je platným Medzinárodným bankovým číslom účtu (IBAN).',
    'This value is not a valid ISBN-10.' => 'Táto hodnota je neplatné ISBN-10.',
    'This value is not a valid ISBN-13.' => 'Táto hodnota je neplatné ISBN-13.',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => 'Táto hodnota nie je platné ISBN-10 ani ISBN-13.',
    'This value is not a valid ISSN.' => 'Táto hodnota nie je platné ISSN.',
    'This value is not a valid currency.' => 'Táto hodnota nie je platná mena.',
    'This value should be equal to {{ compared_value }}.' => 'Táto hodnota by mala byť rovná {{ compared_value }}.',
    'This value should be greater than {{ compared_value }}.' => 'Táto hodnota by mala byť väčšia ako {{ compared_value }}.',
    'This value should be greater than or equal to {{ compared_value }}.' => 'Táto hodnota by mala byť väčšia alebo rovná {{ compared_value }}.',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Táto hodnota by mala byť typu {{ compared_value_type }} a zároveň by mala byť rovná {{ compared_value }}.',
    'This value should be less than {{ compared_value }}.' => 'Táto hodnota by mala byť menšia ako {{ compared_value }}.',
    'This value should be less than or equal to {{ compared_value }}.' => 'Táto hodnota by mala byť menšia alebo rovná {{ compared_value }}.',
    'This value should not be equal to {{ compared_value }}.' => 'Táto hodnota by nemala byť rovná {{ compared_value }}.',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => 'Táto hodnota by nemala byť typu {{ compared_value_type }} a zároveň by nemala byť rovná {{ compared_value }}.',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => 'Pomer strán obrázku je príliš veľký ({{ ratio }}). Maximálny povolený pomer strán obrázku je {{ max_ratio }}.',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => 'Pomer strán obrázku je príliš malý ({{ ratio }}). Minimálny povolený pomer strán obrázku je {{ min_ratio }}.',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => 'Strany obrázku sú štvorcové ({{ width }}x{{ height }}px). Štvorcové obrázky nie sú povolené.',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => 'Obrázok je orientovaný na šírku ({{ width }}x{{ height }}px). Obrázky orientované na šírku nie sú povolené.',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => 'Obrázok je orientovaný na výšku ({{ width }}x{{ height }}px). Obrázky orientované na výšku nie sú povolené.',
    'An empty file is not allowed.' => 'Súbor nesmie byť prázdny.',
    'The host could not be resolved.' => 'Hostiteľa nebolo možné rozpoznať.',
    'This value does not match the expected {{ charset }} charset.' => 'Táto hodnota nezodpovedá očakávanej znakovej sade {{ charset }}.',
    'This is not a valid Business Identifier Code (BIC).' => 'Táto hodnota nie je platným Obchodným identifikačným kódom (BIC).',
    'Error' => 'Chyba',
    'This is not a valid UUID.' => 'Táto hodnota nie je platným UUID.',
    'This value should be a multiple of {{ compared_value }}.' => 'Táto hodnota by mala byť násobkom {{ compared_value }}.',
    'This Business Identifier Code (BIC) is not associated with IBAN {{ iban }}.' => 'Tento identifikačný kód podniku (BIC) nie je spojený s IBAN {{ iban }}.',
    'This value should be valid JSON.' => 'Táto hodnota by mala byť platný JSON.',
    'This collection should contain only unique elements.' => 'Táto kolekcia by mala obsahovať len unikátne prkvy.',
    'This value should be positive.' => 'Táto hodnota by mala byť kladná.',
    'This value should be either positive or zero.' => 'Táto hodnota by mala byť kladná alebo nulová.',
    'This value should be negative.' => 'Táto hodnota by mala byť záporná.',
    'This value should be either negative or zero.' => 'Táto hodnota by mala byť záporná alebo nulová.',
    'This value is not a valid timezone.' => 'Táto hodnota nie je platné časové pásmo.',
    'This password has been leaked in a data breach, it must not be used. Please use another password.' => 'Toto heslo uniklo pri narušení ochrany dát, nie je možné ho použiť. Prosím, použite iné heslo.',
    'This value should be between {{ min }} and {{ max }}.' => 'Táto hodnota by mala byť medzi {{ min }} a {{ max }}.',
    'This value is not a valid hostname.' => 'Táto hodnota nie je platný hostname.',
    'The number of elements in this collection should be a multiple of {{ compared_value }}.' => 'Počet prvkov v tejto kolekcii musí byť násobok {{ compared_value }}.',
    'This value should satisfy at least one of the following constraints:' => 'Táto hodnota musí spĺňať aspoň jedno z nasledujúcich obmedzení:',
    'Each element of this collection should satisfy its own set of constraints.' => 'Každý prvok v tejto kolekcii musí spĺňať svoje vlastné obmedzenia.',
    'This value is not a valid International Securities Identification Number (ISIN).' => 'Táto hodnota nie je platné medzinárodné označenie cenného papiera (ISIN).',
    'This value should be a valid expression.' => 'Táto hodnota by mala byť platným výrazom.',
    'This value is not a valid CSS color.' => 'Táto hodnota nie je platná CSS farba.',
    'This value is not a valid CIDR notation.' => 'Táto hodnota nie je platnou notáciou CIDR.',
    'The value of the netmask should be between {{ min }} and {{ max }}.' => 'Hodnota masky siete by mala byť medzi {{ min }} a {{ max }}.',
    'The filename is too long. It should have {{ filename_max_length }} character or less.|The filename is too long. It should have {{ filename_max_length }} characters or less.' => 'Názov súboru je príliš dlhý. Mal by mať {{ filename_max_length }} znak alebo menej.|Názov súboru je príliš dlhý. Mal by mať {{ filename_max_length }} znaky alebo menej.|Názov súboru je príliš dlhý. Mal by mať {{ filename_max_length }} znakov alebo menej.',
    'The password strength is too low. Please use a stronger password.' => 'Sila hesla je príliš nízka. Použite silnejšie heslo.',
    'This value contains characters that are not allowed by the current restriction-level.' => 'Táto hodnota obsahuje znaky, ktoré nie sú povolené aktuálnou úrovňou obmedzenia.',
    'Using invisible characters is not allowed.' => 'Používanie neviditeľných znakov nie je povolené.',
    'Mixing numbers from different scripts is not allowed.' => 'Miešanie čísel z rôznych skriptov nie je povolené.',
    'Using hidden overlay characters is not allowed.' => 'Používanie skrytých prekryvných znakov nie je povolené.',
    'The extension of the file is invalid ({{ extension }}). Allowed extensions are {{ extensions }}.' => 'Prípona súboru je neplatná ({{ extension }}). Povolené prípony sú {{ extensions }}.',
    'The detected character encoding is invalid ({{ detected }}). Allowed encodings are {{ encodings }}.' => 'Zistené kódovanie znakov je neplatné ({{ detected }}). Povolené kódovania sú {{ encodings }}.',
    'This value is not a valid MAC address.' => 'Táto hodnota nie je platnou MAC adresou.',
    'This URL is missing a top-level domain.' => 'Tomuto URL chýba doména najvyššej úrovne.',
    'This form should not contain extra fields.' => 'Polia by nemali obsahovať ďalšie prvky.',
    'The uploaded file was too large. Please try to upload a smaller file.' => 'Odoslaný súbor je príliš veľký. Prosím odošlite súbor s menšou veľkosťou.',
    'The CSRF token is invalid. Please try to resubmit the form.' => 'CSRF token je neplatný. Prosím skúste znovu odoslať formulár.',
    'This value is not a valid HTML5 color.' => 'Táto hodnota nie je platná HTML5 farba.',
    'Please enter a valid birthdate.' => 'Prosím zadajte platný dátum narodenia.',
    'The selected choice is invalid.' => 'Vybraná možnosť je neplatná.',
    'The collection is invalid.' => 'Kolekcia je neplatná.',
    'Please select a valid color.' => 'Prosím vyberte platnú farbu.',
    'Please select a valid country.' => 'Prosím vyberte platnú krajinu.',
    'Please select a valid currency.' => 'Prosím vyberte platnú menu.',
    'Please choose a valid date interval.' => 'Prosím vyberte platný rozsah dát.',
    'Please enter a valid date and time.' => 'Prosím zadajte platný dátum a čas.',
    'Please enter a valid date.' => 'Prosím zadajte platný dátum.',
    'Please select a valid file.' => 'Prosím vyberte platný súbor.',
    'The hidden field is invalid.' => 'Skryté pole je neplatné.',
    'Please enter an integer.' => 'Prosím zadajte celé číslo.',
    'Please select a valid language.' => 'Prosím vyberte platný jazyk.',
    'Please select a valid locale.' => 'Prosím vyberte platné miestne nastavenia.',
    'Please enter a valid money amount.' => 'Prosím zadajte platnú čiastku.',
    'Please enter a number.' => 'Prosím zadajte číslo.',
    'The password is invalid.' => 'Heslo je neprávne.',
    'Please enter a percentage value.' => 'Prosím zadajte percentuálnu hodnotu.',
    'The values do not match.' => 'Hodnoty nie sú zhodné.',
    'Please enter a valid time.' => 'Prosím zadajte platný čas.',
    'Please select a valid timezone.' => 'Prosím vyberte platné časové pásmo.',
    'Please enter a valid URL.' => 'Prosím zadajte platnú URL.',
    'Please enter a valid search term.' => 'Prosím zadajte platný vyhľadávací výraz.',
    'Please provide a valid phone number.' => 'Prosím zadajte platné telefónne číslo.',
    'The checkbox has an invalid value.' => 'Zaškrtávacie políčko má neplatnú hodnotu.',
    'Please enter a valid email address.' => 'Prosím zadajte platnú emailovú adresu.',
    'Please select a valid option.' => 'Prosím vyberte platnú možnosť.',
    'Please select a valid range.' => 'Prosím vyberte platný rozsah.',
    'Please enter a valid week.' => 'Prosím zadajte platný týždeň.',
  ),
  'security' => 
  array (
    'An authentication exception occurred.' => 'Pri overovaní došlo k chybe.',
    'Authentication credentials could not be found.' => 'Overovacie údaje neboli nájdené.',
    'Authentication request could not be processed due to a system problem.' => 'Požiadavok na overenie nemohol byť spracovaný kvôli systémovej chybe.',
    'Invalid credentials.' => 'Neplatné prihlasovacie údaje.',
    'Cookie has already been used by someone else.' => 'Cookie už bolo použité niekým iným.',
    'Not privileged to request the resource.' => 'Nemáte oprávnenie pristupovať k prostriedku.',
    'Invalid CSRF token.' => 'Neplatný CSRF token.',
    'No authentication provider found to support the authentication token.' => 'Poskytovateľ pre overovací token nebol nájdený.',
    'No session available, it either timed out or cookies are not enabled.' => 'Session nie je k dispozíci, vypršala jej platnosť, alebo sú zakázané cookies.',
    'No token could be found.' => 'Token nebol nájdený.',
    'Username could not be found.' => 'Prihlasovacie meno nebolo nájdené.',
    'Account has expired.' => 'Platnosť účtu skončila.',
    'Credentials have expired.' => 'Platnosť prihlasovacích údajov skončila.',
    'Account is disabled.' => 'Účet je zakázaný.',
    'Account is locked.' => 'Účet je zablokovaný.',
    'Too many failed login attempts, please try again later.' => 'Príliš mnoho neúspešných pokusov o prihlásenie. Skúste to prosím znovu neskôr.',
    'Invalid or expired login link.' => 'Neplatný alebo expirovaný odkaz na prihlásenie.',
    'Too many failed login attempts, please try again in %minutes% minute.' => 'Príliš veľa neúspešných pokusov o prihlásenie. Skúste to znova o %minutes% minútu.',
    'Too many failed login attempts, please try again in %minutes% minutes.' => 'Príliš veľa neúspešných pokusov o prihlásenie, skúste to prosím znova o %minutes% minútu.|Príliš veľa neúspešných pokusov o prihlásenie, skúste to prosím znova o %minutes% minúty.|Príliš veľa neúspešných pokusov o prihlásenie, skúste to prosím znova o %minutes% minút.',
  ),
  'VerifyEmailBundle' => 
  array (
    '%count% year|%count% years' => '%count% rok|%count% roky|%count% rokov',
    '%count% month|%count% months' => '%count% mesiac|%count% mesiace|%count% mesiacov',
    '%count% day|%count% days' => '%count% den|%count% dni|%count% dní',
    '%count% hour|%count% hours' => '%count% hodina|%count% hodiny|%count% hodín',
    '%count% minute|%count% minutes' => '%count% minúta|%count% minúty|%count% minút',
  ),
));

$catalogueEn = new MessageCatalogue('en', array (
  'validators' => 
  array (
    'This value should be false.' => 'This value should be false.',
    'This value should be true.' => 'This value should be true.',
    'This value should be of type {{ type }}.' => 'This value should be of type {{ type }}.',
    'This value should be blank.' => 'This value should be blank.',
    'The value you selected is not a valid choice.' => 'The value you selected is not a valid choice.',
    'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.' => 'You must select at least {{ limit }} choice.|You must select at least {{ limit }} choices.',
    'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.' => 'You must select at most {{ limit }} choice.|You must select at most {{ limit }} choices.',
    'One or more of the given values is invalid.' => 'One or more of the given values is invalid.',
    'This field was not expected.' => 'This field was not expected.',
    'This field is missing.' => 'This field is missing.',
    'This value is not a valid date.' => 'This value is not a valid date.',
    'This value is not a valid datetime.' => 'This value is not a valid datetime.',
    'This value is not a valid email address.' => 'This value is not a valid email address.',
    'The file could not be found.' => 'The file could not be found.',
    'The file is not readable.' => 'The file is not readable.',
    'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.' => 'The file is too large ({{ size }} {{ suffix }}). Allowed maximum size is {{ limit }} {{ suffix }}.',
    'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.' => 'The mime type of the file is invalid ({{ type }}). Allowed mime types are {{ types }}.',
    'This value should be {{ limit }} or less.' => 'This value should be {{ limit }} or less.',
    'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.' => 'This value is too long. It should have {{ limit }} character or less.|This value is too long. It should have {{ limit }} characters or less.',
    'This value should be {{ limit }} or more.' => 'This value should be {{ limit }} or more.',
    'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.' => 'This value is too short. It should have {{ limit }} character or more.|This value is too short. It should have {{ limit }} characters or more.',
    'This value should not be blank.' => 'This value should not be blank.',
    'This value should not be null.' => 'This value should not be null.',
    'This value should be null.' => 'This value should be null.',
    'This value is not valid.' => 'This value is not valid.',
    'This value is not a valid time.' => 'This value is not a valid time.',
    'This value is not a valid URL.' => 'This value is not a valid URL.',
    'The two values should be equal.' => 'The two values should be equal.',
    'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.' => 'The file is too large. Allowed maximum size is {{ limit }} {{ suffix }}.',
    'The file is too large.' => 'The file is too large.',
    'The file could not be uploaded.' => 'The file could not be uploaded.',
    'This value should be a valid number.' => 'This value should be a valid number.',
    'This file is not a valid image.' => 'This file is not a valid image.',
    'This is not a valid IP address.' => 'This value is not a valid IP address.',
    'This value is not a valid language.' => 'This value is not a valid language.',
    'This value is not a valid locale.' => 'This value is not a valid locale.',
    'This value is not a valid country.' => 'This value is not a valid country.',
    'This value is already used.' => 'This value is already used.',
    'The size of the image could not be detected.' => 'The size of the image could not be detected.',
    'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.' => 'The image width is too big ({{ width }}px). Allowed maximum width is {{ max_width }}px.',
    'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.' => 'The image width is too small ({{ width }}px). Minimum width expected is {{ min_width }}px.',
    'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.' => 'The image height is too big ({{ height }}px). Allowed maximum height is {{ max_height }}px.',
    'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.' => 'The image height is too small ({{ height }}px). Minimum height expected is {{ min_height }}px.',
    'This value should be the user\'s current password.' => 'This value should be the user\'s current password.',
    'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.' => 'This value should have exactly {{ limit }} character.|This value should have exactly {{ limit }} characters.',
    'The file was only partially uploaded.' => 'The file was only partially uploaded.',
    'No file was uploaded.' => 'No file was uploaded.',
    'No temporary folder was configured in php.ini.' => 'No temporary folder was configured in php.ini, or the configured folder does not exist.',
    'Cannot write temporary file to disk.' => 'Cannot write temporary file to disk.',
    'A PHP extension caused the upload to fail.' => 'A PHP extension caused the upload to fail.',
    'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.' => 'This collection should contain {{ limit }} element or more.|This collection should contain {{ limit }} elements or more.',
    'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.' => 'This collection should contain {{ limit }} element or less.|This collection should contain {{ limit }} elements or less.',
    'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.' => 'This collection should contain exactly {{ limit }} element.|This collection should contain exactly {{ limit }} elements.',
    'Invalid card number.' => 'Invalid card number.',
    'Unsupported card type or invalid card number.' => 'Unsupported card type or invalid card number.',
    'This is not a valid International Bank Account Number (IBAN).' => 'This value is not a valid International Bank Account Number (IBAN).',
    'This value is not a valid ISBN-10.' => 'This value is not a valid ISBN-10.',
    'This value is not a valid ISBN-13.' => 'This value is not a valid ISBN-13.',
    'This value is neither a valid ISBN-10 nor a valid ISBN-13.' => 'This value is neither a valid ISBN-10 nor a valid ISBN-13.',
    'This value is not a valid ISSN.' => 'This value is not a valid ISSN.',
    'This value is not a valid currency.' => 'This value is not a valid currency.',
    'This value should be equal to {{ compared_value }}.' => 'This value should be equal to {{ compared_value }}.',
    'This value should be greater than {{ compared_value }}.' => 'This value should be greater than {{ compared_value }}.',
    'This value should be greater than or equal to {{ compared_value }}.' => 'This value should be greater than or equal to {{ compared_value }}.',
    'This value should be identical to {{ compared_value_type }} {{ compared_value }}.' => 'This value should be identical to {{ compared_value_type }} {{ compared_value }}.',
    'This value should be less than {{ compared_value }}.' => 'This value should be less than {{ compared_value }}.',
    'This value should be less than or equal to {{ compared_value }}.' => 'This value should be less than or equal to {{ compared_value }}.',
    'This value should not be equal to {{ compared_value }}.' => 'This value should not be equal to {{ compared_value }}.',
    'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.' => 'This value should not be identical to {{ compared_value_type }} {{ compared_value }}.',
    'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.' => 'The image ratio is too big ({{ ratio }}). Allowed maximum ratio is {{ max_ratio }}.',
    'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.' => 'The image ratio is too small ({{ ratio }}). Minimum ratio expected is {{ min_ratio }}.',
    'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.' => 'The image is square ({{ width }}x{{ height }}px). Square images are not allowed.',
    'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.' => 'The image is landscape oriented ({{ width }}x{{ height }}px). Landscape oriented images are not allowed.',
    'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.' => 'The image is portrait oriented ({{ width }}x{{ height }}px). Portrait oriented images are not allowed.',
    'An empty file is not allowed.' => 'An empty file is not allowed.',
    'The host could not be resolved.' => 'The host could not be resolved.',
    'This value does not match the expected {{ charset }} charset.' => 'This value does not match the expected {{ charset }} charset.',
    'This is not a valid Business Identifier Code (BIC).' => 'This value is not a valid Business Identifier Code (BIC).',
    'Error' => 'Error',
    'This is not a valid UUID.' => 'This value is not a valid UUID.',
    'This value should be a multiple of {{ compared_value }}.' => 'This value should be a multiple of {{ compared_value }}.',
    'This Business Identifier Code (BIC) is not associated with IBAN {{ iban }}.' => 'This Business Identifier Code (BIC) is not associated with IBAN {{ iban }}.',
    'This value should be valid JSON.' => 'This value should be valid JSON.',
    'This collection should contain only unique elements.' => 'This collection should contain only unique elements.',
    'This value should be positive.' => 'This value should be positive.',
    'This value should be either positive or zero.' => 'This value should be either positive or zero.',
    'This value should be negative.' => 'This value should be negative.',
    'This value should be either negative or zero.' => 'This value should be either negative or zero.',
    'This value is not a valid timezone.' => 'This value is not a valid timezone.',
    'This password has been leaked in a data breach, it must not be used. Please use another password.' => 'This password has been leaked in a data breach, it must not be used. Please use another password.',
    'This value should be between {{ min }} and {{ max }}.' => 'This value should be between {{ min }} and {{ max }}.',
    'This value is not a valid hostname.' => 'This value is not a valid hostname.',
    'The number of elements in this collection should be a multiple of {{ compared_value }}.' => 'The number of elements in this collection should be a multiple of {{ compared_value }}.',
    'This value should satisfy at least one of the following constraints:' => 'This value should satisfy at least one of the following constraints:',
    'Each element of this collection should satisfy its own set of constraints.' => 'Each element of this collection should satisfy its own set of constraints.',
    'This value is not a valid International Securities Identification Number (ISIN).' => 'This value is not a valid International Securities Identification Number (ISIN).',
    'This value should be a valid expression.' => 'This value should be a valid expression.',
    'This value is not a valid CSS color.' => 'This value is not a valid CSS color.',
    'This value is not a valid CIDR notation.' => 'This value is not a valid CIDR notation.',
    'The value of the netmask should be between {{ min }} and {{ max }}.' => 'The value of the netmask should be between {{ min }} and {{ max }}.',
    'The filename is too long. It should have {{ filename_max_length }} character or less.|The filename is too long. It should have {{ filename_max_length }} characters or less.' => 'The filename is too long. It should have {{ filename_max_length }} character or less.|The filename is too long. It should have {{ filename_max_length }} characters or less.',
    'The password strength is too low. Please use a stronger password.' => 'The password strength is too low. Please use a stronger password.',
    'This value contains characters that are not allowed by the current restriction-level.' => 'This value contains characters that are not allowed by the current restriction-level.',
    'Using invisible characters is not allowed.' => 'Using invisible characters is not allowed.',
    'Mixing numbers from different scripts is not allowed.' => 'Mixing numbers from different scripts is not allowed.',
    'Using hidden overlay characters is not allowed.' => 'Using hidden overlay characters is not allowed.',
    'The extension of the file is invalid ({{ extension }}). Allowed extensions are {{ extensions }}.' => 'The extension of the file is invalid ({{ extension }}). Allowed extensions are {{ extensions }}.',
    'The detected character encoding is invalid ({{ detected }}). Allowed encodings are {{ encodings }}.' => 'The detected character encoding is invalid ({{ detected }}). Allowed encodings are {{ encodings }}.',
    'This value is not a valid MAC address.' => 'This value is not a valid MAC address.',
    'This URL is missing a top-level domain.' => 'This URL is missing a top-level domain.',
    'This value is too short. It should contain at least one word.|This value is too short. It should contain at least {{ min }} words.' => 'This value is too short. It should contain at least one word.|This value is too short. It should contain at least {{ min }} words.',
    'This value is too long. It should contain one word.|This value is too long. It should contain {{ max }} words or less.' => 'This value is too long. It should contain one word.|This value is too long. It should contain {{ max }} words or less.',
    'This form should not contain extra fields.' => 'This form should not contain extra fields.',
    'The uploaded file was too large. Please try to upload a smaller file.' => 'The uploaded file was too large. Please try to upload a smaller file.',
    'The CSRF token is invalid. Please try to resubmit the form.' => 'The CSRF token is invalid. Please try to resubmit the form.',
    'This value is not a valid HTML5 color.' => 'This value is not a valid HTML5 color.',
    'Please enter a valid birthdate.' => 'Please enter a valid birthdate.',
    'The selected choice is invalid.' => 'The selected choice is invalid.',
    'The collection is invalid.' => 'The collection is invalid.',
    'Please select a valid color.' => 'Please select a valid color.',
    'Please select a valid country.' => 'Please select a valid country.',
    'Please select a valid currency.' => 'Please select a valid currency.',
    'Please choose a valid date interval.' => 'Please choose a valid date interval.',
    'Please enter a valid date and time.' => 'Please enter a valid date and time.',
    'Please enter a valid date.' => 'Please enter a valid date.',
    'Please select a valid file.' => 'Please select a valid file.',
    'The hidden field is invalid.' => 'The hidden field is invalid.',
    'Please enter an integer.' => 'Please enter an integer.',
    'Please select a valid language.' => 'Please select a valid language.',
    'Please select a valid locale.' => 'Please select a valid locale.',
    'Please enter a valid money amount.' => 'Please enter a valid money amount.',
    'Please enter a number.' => 'Please enter a number.',
    'The password is invalid.' => 'The password is invalid.',
    'Please enter a percentage value.' => 'Please enter a percentage value.',
    'The values do not match.' => 'The values do not match.',
    'Please enter a valid time.' => 'Please enter a valid time.',
    'Please select a valid timezone.' => 'Please select a valid timezone.',
    'Please enter a valid URL.' => 'Please enter a valid URL.',
    'Please enter a valid search term.' => 'Please enter a valid search term.',
    'Please provide a valid phone number.' => 'Please provide a valid phone number.',
    'The checkbox has an invalid value.' => 'The checkbox has an invalid value.',
    'Please enter a valid email address.' => 'Please enter a valid email address.',
    'Please select a valid option.' => 'Please select a valid option.',
    'Please select a valid range.' => 'Please select a valid range.',
    'Please enter a valid week.' => 'Please enter a valid week.',
  ),
  'security' => 
  array (
    'An authentication exception occurred.' => 'An authentication exception occurred.',
    'Authentication credentials could not be found.' => 'Authentication credentials could not be found.',
    'Authentication request could not be processed due to a system problem.' => 'Authentication request could not be processed due to a system problem.',
    'Invalid credentials.' => 'Invalid credentials.',
    'Cookie has already been used by someone else.' => 'Cookie has already been used by someone else.',
    'Not privileged to request the resource.' => 'Not privileged to request the resource.',
    'Invalid CSRF token.' => 'Invalid CSRF token.',
    'No authentication provider found to support the authentication token.' => 'No authentication provider found to support the authentication token.',
    'No session available, it either timed out or cookies are not enabled.' => 'No session available, it either timed out or cookies are not enabled.',
    'No token could be found.' => 'No token could be found.',
    'Username could not be found.' => 'Username could not be found.',
    'Account has expired.' => 'Account has expired.',
    'Credentials have expired.' => 'Credentials have expired.',
    'Account is disabled.' => 'Account is disabled.',
    'Account is locked.' => 'Account is locked.',
    'Too many failed login attempts, please try again later.' => 'Too many failed login attempts, please try again later.',
    'Invalid or expired login link.' => 'Invalid or expired login link.',
    'Too many failed login attempts, please try again in %minutes% minute.' => 'Too many failed login attempts, please try again in %minutes% minute.',
    'Too many failed login attempts, please try again in %minutes% minutes.' => 'Too many failed login attempts, please try again in %minutes% minutes.',
  ),
  'VerifyEmailBundle' => 
  array (
    '%count% year|%count% years' => '%count% year|%count% years',
    '%count% month|%count% months' => '%count% month|%count% months',
    '%count% day|%count% days' => '%count% day|%count% days',
    '%count% hour|%count% hours' => '%count% hour|%count% hours',
    '%count% minute|%count% minutes' => '%count% minute|%count% minutes',
    'The link to verify your email has expired. Please request a new link.' => 'The link to verify your email has expired. Please request a new link.',
    'The link to verify your email is invalid. Please request a new link.' => 'The link to verify your email is invalid. Please request a new link.',
    'The link to verify your email appears to be for a different account or email. Please request a new link.' => 'The link to verify your email appears to be for a different account or email. Please request a new link.',
  ),
));
$catalogue->addFallbackCatalogue($catalogueEn);

return $catalogue;
