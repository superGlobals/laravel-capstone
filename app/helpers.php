<?php

function changeClassCardBorder($class)
{
  if ($class === 'BSIT') {
    return 'border-orange-500';
  }

  if ($class === 'BSBA') {
    return 'border-green-500';
  }

  if ($class === 'BEED' || $class === 'BSED') {
    return 'border-blue-500';
  }
}
