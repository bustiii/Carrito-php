# Kata: Lista de la compra

> Repositorio forkeado de la kata FizzBuzz ([540/FizzBuzz-php](https://github.com/540/FizzBuzz-php)) para reutilizar la configuración de Docker ya existente.

Queremos construir una clase para gestionar una lista de la compra a través de una única función.

La lista comienza vacía. El usuario puede añadir productos, eliminarlos o vaciar la lista completamente. Todas las operaciones se realizan mediante instrucciones en forma de texto.

Tu tarea es implementar una clase que interprete estas instrucciones y mantenga el estado de la lista.

### Reglas generales

- Solo puede haber **una clase pública**, con un **único método público** que reciba una instrucción (`string`) y devuelva el estado actual de la lista.
- El método debe devolver un `string` con los productos actuales de la lista, separados por comas.
- Los productos deben aparecer ordenados alfabéticamente (ignorando mayúsculas/minúsculas).
- Los nombres de producto **no distinguen mayúsculas**: `"Pan"` y `"pan"` son el mismo producto.

### Acciones que debe soportar

**Añadir productos**

- Instrucción: `añadir <nombre> [cantidad]`
- Si no se indica cantidad, se asume 1.
- Si el producto ya existe en la lista, se suma la nueva cantidad a la anterior.
- Ejemplos:
  - `añadir pan` → `"pan x1"`
  - `añadir Pan 2` → `"pan x3"`

**Eliminar productos**

- Instrucción: `eliminar <nombre>`
- Elimina completamente el producto de la lista.
- Si el producto no existe, el método debe devolver exactamente: `El producto seleccionado no existe`

**Vaciar la lista**

- Instrucción: `vaciar`
- Elimina todos los productos de la lista.

### Formato de salida

Después de cada instrucción válida, se devuelve la lista completa como un `string` con los productos separados por comas:

```
<nombre> x<cantidad>
```

Ejemplo: `"leche x2, pan x3"`

Si la lista está vacía, se devuelve una cadena vacía: `""`.

### Ejemplo de flujo

```
"añadir pan"      // "pan x1"
"añadir leche 2"  // "leche x2, pan x1"
"añadir Pan 2"    // "leche x2, pan x3"
"eliminar arroz"  // "El producto seleccionado no existe"
"eliminar pan"    // "leche x2"
"vaciar"          // ""
```

### Criterios de evaluación y buenas prácticas

- **Buena cobertura de tests y aplicación de TDD**
- **Clean Code y buen naming**
- **Buen uso de commits y ciclo de trabajo**
  - Cada commit representa un paso del ciclo TDD:
    - Un commit para cada test que pasa (verde).
    - Un commit para cada refactor (si lo hay).
  - Formato de los mensajes de commit:
    ```
    [verde] - Descripción clara del test que pasa
    [refactor] - Descripción clara del cambio estructural o de estilo
    ```

### Ejecución con Docker:

```bash
# Construir la imagen
docker build -t fizzbuzz-php .

# Entrar al contenedor
docker run -it -v "$(pwd)":/app fizzbuzz-php bash

# Ejecutar los tests dentro del contenedor
vendor/bin/phpunit
```

### Ejecución local (requiere PHP 8.3+):

```bash
composer install
vendor/bin/phpunit
```
