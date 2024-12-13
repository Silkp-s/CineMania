
# Documentación de la API CineMania

## 1. Descripción General

**Nombre de la API**: API de Gestión de Clientes (CineMania)

**Descripción**: Esta API permite realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar) sobre la entidad "Cliente". Es útil para gestionar información de los clientes de la aplicación CineMania.

**URL Base**: `http://127.0.0.1:8000/api`

## 2. Endpoints

### 2.1. Listar Todos los Clientes

- **URL**: `/clients`
- **Método**: `GET`
- **Descripción**: Obtiene una lista de todos los clientes.
- **Respuesta Exitosa (200)**:
  ```json
  {
      "status": true,
      "clientes": [
          {
              "id": 1,
              "nombre": "Juan Pérez",
              "mail": "juanperez@example.com",
              "contraseña": "123456",
              "edad": 30
          },
          {
              "id": 2,
              "nombre": "Maria Gómez",
              "mail": "mariagomez@example.com",
              "contraseña": "abcdef",
              "edad": 25
          }
          ...
      ]
  }
  ```

- **Códigos de Respuesta**:
  - 200: OK
  - 500: Error del Servidor

### 2.2. Crear un Cliente

- **URL**: `/clients`
- **Método**: `POST`
- **Descripción**: Crea un nuevo cliente.
- **Cuerpo de la Solicitud**:
  ```json
  {
      "nombre": "Pedro López",
      "mail": "pedrolopez@example.com",
      "contraseña": "nuevaContraseña",
      "edad": 40
  }
  ```
- **Respuesta Exitosa (200)**:
  ```json
  {
      "status": true,
      "Message": "Cliente Creado con éxito!",
      "Cliente": {
          "id": 3,
          "nombre": "Pedro López",
          "mail": "pedrolopez@example.com",
          "contraseña": "nuevaContraseña",
          "edad": 40
      }
  }
  ```

- **Códigos de Respuesta**:
  - 200: Creado con éxito
  - 400: Solicitud Incorrecta
  - 500: Error del Servidor

### 2.3. Actualizar un Cliente

- **URL**: `/clients/{id}`
- **Método**: `PUT`
- **Descripción**: Actualiza los detalles de un cliente existente.
- **Parámetros**:
  - `{id}`: ID del cliente a actualizar (entero).
- **Cuerpo de la Solicitud**:
  ```json
  {
      "nombre": "Pedro López Actualizado",
      "mail": "pedrolopez@nuevoemail.com",
      "contraseña": "123456789",
      "edad": 41
  }
  ```
- **Respuesta Exitosa (200)**:
  ```json
  {
      "Message": "Actualizado con éxito",
      "Cliente": {
          "id": 3,
          "nombre": "Pedro López Actualizado",
          "mail": "pedrolopez@nuevoemail.com",
          "contraseña": "123456789",
          "edad": 41
      },
      "status": 200
  }
  ```

- **Códigos de Respuesta**:
  - 200: OK
  - 404: No se encontró el cliente
  - 500: Error del Servidor

### 2.4. Eliminar un Cliente

- **URL**: `/clients/{id}`
- **Método**: `DELETE`
- **Descripción**: Elimina un cliente específico.
- **Parámetros**:
  - `{id}`: ID del cliente a eliminar (entero).
- **Respuesta Exitosa (200)**:
  ```json
  {
      "Message": "Eliminado Con Éxito!",
      "Cliente": "Cliente eliminado",
      "status": 200
  }
  ```

- **Códigos de Respuesta**:
  - 200: Eliminado con éxito
  - 404: No se encontró el cliente
  - 500: Error del Servidor

## 3. Ejemplos de Uso

### 3.1. Ejemplo de Solicitud GET con `curl`

```bash
curl -X GET http://127.0.0.1:8000/api/clients
```

### 3.2. Ejemplo de Solicitud POST con `curl`

```bash
curl -X POST http://127.0.0.1:8000/api/clients \
-H "Content-Type: application/json" \
-d '{"nombre":"Pedro López","mail":"pedrolopez@example.com","contraseña":"nuevaContraseña","edad":40}'
```

### 3.3. Ejemplo de Solicitud PUT con `curl`

```bash
curl -X PUT http://127.0.0.1:8000/api/clients/3 \
-H "Content-Type: application/json" \
-d '{"nombre":"Pedro López Actualizado","mail":"pedrolopez@nuevoemail.com","contraseña":"123456789","edad":41}'
```

### 3.4. Ejemplo de Solicitud DELETE con `curl`

```bash
curl -X DELETE http://127.0.0.1:8000/api/clients/3
```

## 4. Consideraciones Adicionales

- **Autenticación**: Esta API no requiere autenticación.
- **Errores Comunes**: Verifica que el ID proporcionado sea correcto y que el formato del cuerpo de la solicitud cumpla con los requisitos esperados.

## 5. Contacto

Para más información, contacte al desarrollador en [dtorresc@it.ucsc.cl].
