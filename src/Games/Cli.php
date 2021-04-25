<?php

namespace Brain\Games\Cli;

use Brain\Games\GameEngine;

use function cli\line;
use function cli\prompt;

function game(): void
{
    GameEngine\greeting();
}
