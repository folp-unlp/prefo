Guía de estilo recomendada
==========================

El estilo utilizado en esta guía y que se recomienda para el proyecto en general deriva de la PHP Standards Recommendations (PSR). En concreto [PSR-1](https://www.php-fig.org/psr/psr-1/) y [PSR-12](https://www.php-fig.org/psr/psr-12/) que hacen referencia a codificación básica y al estilo de codificación respectivamente.

## Tabla de contenido

- [1. Generalidades](#1-generalidades)
    - [1.1 PSR-1 Basic coding standard](#11-psr-1-basic-coding-standard)
    - [1.2 PSR-12 Coding style guide](#12-psr-12-coding-style-guide)
- [2. Ejemplos](#2-ejemplos)
    - [2.1 Namespace y use](#21-namespace-y-use)
    - [2.2 Propiedades](#22-propiedades)
    - [2.3 Métodos](#23-métodos)
    - [2.4 Métodos con argumento en varias lineas](#24-métodos-con-argumento-en-varias-lineas)
    - [2.5 abstract, final y static](#25-abstract-final-y-static)
    - [2.6 Llamadas a métodos y funciones](#26-llamadas-a-métodos-y-funciones)
    - [2.7 if, elseif y else](#27-if-elseif-y-else)
    - [2.8 switch, case](#28-switch-case)
    - [2.9 while y do while](#29-while-y-do-while)
    - [2.10 for](#210-for)
    - [2.11 foreach](#211-foreach)
    - [2.12 try y catch](#212-try-y-catch)
- [3. Buenas prácticas](#3-buenas-prácticas)
    - [3.1 Longitud de línea](#31-longitud-de-línea)
    - [3.2 Comentarios](#32-comentarios)
    - [3.3 Alineación de variables](#33-alineación-de-variables)
    - [3.4 Constantes](#34-constantes)
    - [3.5 Espacios en blanco](#35-espacios-en-blanco)
    - [3.6 Sangrado](#36-sangrado)
    - [3.7 Comillas dobles y simples](#37-comillas-dobles-y-simples)
    - [3.8 Expresiones lógicas](#38-expresiones-lógicas)
    - [3.9 Librerias](#39-librerias)

## 1. Generalidades

>El uso del idioma inglés para definir nombres de funciones, variables o parámetroe aún no esta definido y se deja a los desarrolladores decidir qué usar.

### 1.1 PSR-1 Basic coding standard

- Utilizar solo los tag `<?php ?>` y/o `<?= ?>`, ningún otro tag de apertura/cierre (ejemplo `<? ?>`, `<% %>`, etc...).
- Utilizar siempre codificación UTF-8 para el código PHP.
- Los archivos deben declarar clases, funciones, constantes, etc... o ejecutar la lógica (por ejemplo, generar resultados, cambiar configuraciones de .ini, etc.) pero no deberían hacer ambas cosas.
- Los nombres de clase se declaran en StudlyCaps.
- Las constantes se declaran en mayúsculas con separadores de subrayado (MI_CONSTANTE).
- Los nombres de los métodos se declaran en camelCase.

### 1.2 PSR-12 Coding style guide

- Usar 4 espacios para la sangría, no utilizar tabulaciones.
- Las líneas deben tener menos de 80 caracteres. Las líneas más largas deberían dividirse en múltiples líneas.
- No debería haber más de una declaración por línea.
- Las palabras clave o reservadas deben estar en minusculas.
- `null`, `true` y `false` deben estar en minuscula.
- Debe haber una línea en blanco después de la declaración del `namespace`.
- Debe haber una línea en blanco después de las declaraciones `use`.
- Las palabras clave `extends` e `implements` deben declararse en la misma línea que el nombre de la clase.
- La apertura de llaves `{` en las clases y métodos debe ir en la siguiente línea, y la llave de cierre `}` debe pasar a la siguiente línea después del cuerpo.
- La visibilidad (`public`, `protected` o `private`) debe declararse siempre en todas las propiedades y métodos.
- Entre el nombre de las funciones y métodos y los paréntesis `( )` no debe haber espacios en blanco (ej.: `miFuncion()`).
- En la lista de argumentos, no debe haber un espacio antes de cada coma pero si debe haber un espacio después de cada coma.
- Los argumentos del método con valores predeterminados deben ir al final de la lista de argumentos.
- La llave de apertura `{` para estructuras de control (ej.: `if`, `for`, `while`) deben seguir en la misma línea, y la llave de cierre `}` debe pasar a la siguiente línea después del cuerpo.

## 2. Ejemplos:

### 2.1 Namespace y use

```php
namespace Vendor\Package;

use FooClass;
use BarClass as Bar;
use OtherVendor\OtherPackage\BazClass;

// code
Extends y Implements

class ClassName extends ParentClass implements \ArrayAccess, \Countable
{
    // constants, properties, methods
}
```

### 2.2 Propiedades

```php
class ClassName
{
    public $foo = null;

    // methods
}
```

### 2.3 Métodos

```php
public function fooBarBaz($arg1, $arg2, $arg3 = [])
{
    // method body
}
```

### 2.4 Métodos con argumento en varias lineas

```php
public function aVeryLongMethodName(
    ClassTypeHint $arg1,
    $arg2,
    array $arg3 = []
) {
    // method body
}
```

### 2.5 abstract, final y static

```php
namespace Vendor\Package;

abstract class ClassName
{
    protected static $foo;

    abstract protected function zim();

    final public static function bar()
    {
        // method body
    }
}
```

### 2.6 Llamadas a métodos y funciones

```php
// llamada a función
bar($arg2, $arg3);

// llamada a método
$foo->bar($arg1);

// llamada a método estático con argumentos
Foo::bar($arg2, $arg3);

// llamada a método con argumentos multilinea
$foo->bar(
    $longArgument,
    $longerArgument,
    $muchLongerArgument
);
```

### 2.7 if, elseif y else

```php
if ($expr1) {
    // if body
} elseif ($expr2) {
    // elseif body
} else {
    // else body;
}
```

### 2.8 switch, case

```php
switch ($expr) {
    case 0:
        echo 'First case, with a break';
        break;
    case 1:
        echo 'Second case, which falls through';
        // no break
    case 2:
    case 3:
    case 4:
        echo 'Third case, return instead of break';
        return;
    default:
        echo 'Default case';
        break;
}
```

### 2.9 while y do while

```php
while ($expr) {
    // while body
}

do {
    // structure body;
} while ($expr);
```

### 2.10 for

```php
for ($i = 0; $i < 10; $i++) {
    // for body
}
```

### 2.11 foreach

```php
foreach ($iterable as $key => $value) {
    // foreach body
}
```

### 2.12 try y catch

```php
try {
    // try body
} catch (FirstExceptionType $e) {
    // catch body
} catch (OtherExceptionType $e) {
    // catch body
}
```

## 3. Buenas prácticas

### 3.1 Longitud de línea

Al partir una línea, la segunda y siguientes líneas deben sangrarse 4 espacios. Si es posible, estas líneas deben empezar por un operador.

```php
echo "<p>Este texto es muy largo y no cabe en una sola línea, así que he "
    . "partido el texto en dos líneas escribiendo el operador de concatenación "
    . "(.) al principio de cada línea.</p>";
```

### 3.2 Comentarios

Los programas deben incluir al principio del documento bloques de comentarios a modo de cocumentación (docblocks).

```php
<?php
/**
* Descripción breve
*
* Descripción extensa (opcional)
*
* @author Cosme Fulanito <cosme.fulanito@mail.com>
* @copyright 2022 Cosme Fulanito
* @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
* @version 2022-02-06
* @link http://www.example.org
*/
?>
```

Dentro del código las intrucciones deberían ser autodefinidas como para no necesitar el uso de comentarios.

```php
function getUserName()
{
    // obtiene el nombre de usuario!
}
```

Sin embargo, es posible utilizar comentarios para explicar cómo se debe utilizar una función o una variable en el contexto del framework.

- Se aconseja utilizar `//` en los comentarios de una sola línea.
- Los comentarios de varias líneas se delimitan con `/* */`.
- ***No se debe utilizar #.***

Se aconseja colocar el inicio o el cierre del comentario de varias líneas en una nueva línea.

```php
/**
 *  Datos personales:
 *  Nombre, apellidos
 */
$nombre    = "Cosme"
$apellidos = "Fulanito";

$nombreCompleto = "Cosme Fulanito" // Nombre del individuo
```

### 3.3 Alineación de variables
Si se definen varias variables, se deben alinear las igualdades con espacios en blanco para facilitar la legibilidad.

```php
$nombre         = "Fulano";
$nombreAlumno   = "Mengano";
$nombreProfesor = "Zutano";
```

### 3.4 Constantes
Se prefiere `define()` sobre `const`, salvo en los casos que define() no se pueda utilizar, como en una definición de clase.

```php
define("SITE_NAME", "CoreFramework");
define("SITE_OWNER", "FACULTAD DE ODONTOLOGÍA");

const VERSION = '1.0';
const FECHA_LANZAMIENTO = '2022-06-01';
```

### 3.5 Espacios en blanco

Cualquier operador binario (por ejemplo: + - * / = . == && || ? : ) debe estar rodeado de espacios en blanco.

```php
$cmTotal = 100000 * $km + 100 * $m + $cm;
```

Los operadores unarios (por ejemplo: ! ++ --) deben unirse a su argumento sin espacios en blanco

```php
$correcto = !$error;
```

Se aconseja separar con líneas en blanco las diferentes partes de un programa (recogida de datos, mensajes de error, respuesta del programa, etc.).

### 3.6 Sangrado
Se debe utilizar un sangrado de 4 espacios y no utilizar tabuladores. En estructuras anidadas, se acumularán los sangrados.

```php
if (condicion1) {
    accion1;
} else {
    accion2;
    if (condicion3) {
        accion3;
    } else {
        accion4;
    }
}
```

### 3.7 Comillas dobles y simples
Evita siempre el uso de comillas dobles. PHP analiza el contenido de las comillas dobles en búsqueda de variables que deban ser interpretadas, resultando en un tiempo de ejecución mayor.

`echo` es más rápida que `print`.

Se aconseja emplear la función `echo` y concatenar las cadenas con comas:

```php
echo 'Hola', $nombre, ', ¿qué te trae por acá?
```

requerirá menos tiempo al compilador que:

```php
echo 'Hola' . $nombre . ', ¿qué te trae por acá?'
```

El "peor escenario posible" sería:

```php
print "Hola $nombre, ¿qué te trae por acá?"
```

Se aconseja también que el código html generado por PHP si incluya comillas dobles:

```php
echo "<p style=\"text-align: center\">Hola</p>";
```

### 3.8 Expresiones lógicas
No es necesario comparar las variables booleanas con los valores true o false, se aconseja utilizar directamente la variable o su negación.

En vez de:

```php
if ($correcto == true) {
    echo "<p>Es correcto</p>";
}
if ($correcto == false) {
   echo "<p>No es correcto</p>";
}
```

se aconseja escribir:

```php
if ($correcto) {
    echo "<p>Es correcto</p>";
}
if (!$correcto) {
   echo "<p>No es correcto</p>";
}
```

Al concatenar expresiones lógicas sencillas, no es necesario escribir cada expresión entre paréntesis.

```php
if ($numero < 0 || $numero > 100) {
    echo "<p>El número no está en el intervalo [0, 100]</p>";
}
```

### 3.9 Librerias
Para incluir librerias cuya inclusión no depende de ninguna condición, debe utilizarse `require_once` y no deben utilizarse paréntesis alrededor del nombre de la libreria.

```php
require_once "lib.php";
```
---
#### Fuente: https://github.com/php-fig/fig-standards
