<?php

function changeClassCardBorder($courseName)
{
  switch ($courseName) {
    case 'BSIT':
      return 'border-orange-500';
    case 'BSBA':
      return 'border-blue-500';
    case 'BEED':
      return 'border-green-500';
    case 'BSED':
      return 'border-green-500';
    default:
      return 'border-indigo-500';
  }
}
