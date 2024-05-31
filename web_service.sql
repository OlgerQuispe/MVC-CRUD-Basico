-- Estructura de tabla para la tabla `contactos`

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

INSERT INTO `usuarios` (`id`, `nombre`, `telefono`, `email`) VALUES
(1, 'Juan Perez', '5512345678', 'juan@mail.com'),
(2, 'Pedro Gomez', '5512345698', 'pedro@mail.com'),
(3, 'Ezequiel Ramirez', '5512345687', 'ezequiel@mail.com'),
(4, 'Maria Solano', '5512345663', 'maria@mail.com'),
(5, 'Ana Martinez', '5512345612', 'ana@mail.com');


-- Indices de la tabla `contactos`

ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

-- AUTO_INCREMENT de la tabla `contactos`

ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;


