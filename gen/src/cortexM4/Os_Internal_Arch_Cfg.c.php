/********************************************************
 * DO NOT CHANGE THIS FILE, IT IS GENERATED AUTOMATICALY*
 ********************************************************/

/* Copyright 2008, 2009 Mariano Cerdeiro
 * Copyright 2014, ACSE & CADIEEL
 *      ACSE: http://www.sase.com.ar/asociacion-civil-sistemas-embebidos/ciaa/
 *      CADIEEL: http://www.cadieel.org.ar
 *
 * This file is part of CIAA Firmware.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * 1. Redistributions of source code must retain the above copyright notice,
 *    this list of conditions and the following disclaimer.
 *
 * 2. Redistributions in binary form must reproduce the above copyright notice,
 *    this list of conditions and the following disclaimer in the documentation
 *    and/or other materials provided with the distribution.
 *
 * 3. Neither the name of the copyright holder nor the names of its
 *    contributors may be used to endorse or promote products derived from this
 *    software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 *
 */

/** \brief FreeOSEK Os Generated Internal Achitecture Configuration Implementation File
 **
 ** \file cortexM4/Os_Internal_Arch_Cfg.c
 ** \arch cortexM4
 **/

/** \addtogroup FreeOSEK
 ** @{ */
/** \addtogroup FreeOSEK_Os
 ** @{ */
/** \addtogroup FreeOSEK_Os_Internal
 ** @{ */

/*
 * Initials     Name
 * ---------------------------
 * MaCe			 Mariano Cerdeiro
 * PR           Pablo Ridolfi
 */

/*
 * modification history (new versions first)
 * -----------------------------------------------------------
 * v0.1.1 20141115 PR   added LPC43xx interrupt sources, spelling mistake fixed
 * v0.1.0 20141115 MaCe	initial version
 */

/*==================[inclusions]=============================================*/
#include "Os_Internal.h"

/*==================[macros and definitions]=================================*/

/*==================[internal data declaration]==============================*/

/*==================[internal functions declaration]=========================*/

/*==================[internal data definition]===============================*/

/*==================[external data definition]===============================*/

/*==================[internal functions definition]==========================*/

/*==================[external functions definition]==========================*/
<?php
/* Interrupt sources for LPC43xx. 
 * See externals/platforms/cortexM4/lpc43xx/inc/cmsis_43xx.h.
 */
$intList = array (
   0 => "DAC",
   1 => "M0CORE",
   2 => "DMA",
   3 => "RESERVED1",
   4 => "RESERVED2",
   5 => "ETHERNET",
   6 => "SDIO",
   7 => "LCD",
   8 => "USB0",
   9 => "USB1",
   10 => "SCT",
   11 => "RITIMER",
   12 => "TIMER0",
   13 => "TIMER1",
   14 => "TIMER2",
   15 => "TIMER3",
   16 => "MCPWM",
   17 => "ADC0",
   18 => "I2C0",
   19 => "I2C1",
   20 => "SPI_INT",
   21 => "ADC1",
   22 => "SSP0",
   23 => "SSP1",
   24 => "USART0",
   25 => "UART1",
   26 => "USART2",
   27 => "USART3",
   28 => "I2S0",
   29 => "I2S1",
   30 => "RESERVED4",
   31 => "SGPIO_INT",
   32 => "PIN_INT0",
   33 => "PIN_INT1",
   34 => "PIN_INT2",
   35 => "PIN_INT3",
   36 => "PIN_INT4",
   37 => "PIN_INT5",
   38 => "PIN_INT6",
   39 => "PIN_INT7",
   40 => "GINT0",
   41 => "GINT1",
   42 => "EVENTROUTER",
   43 => "C_CAN1",
   44 => "RESERVED6",
   45 => "ADCHS",
   46 => "ATIMER",
   47 => "RTC",
   48 => "RESERVED8",
   49 => "WWDT",
   50 => "M0SUB",
   51 => "C_CAN0",
   52 => "QEI"
);

$MAX_INT_COUNT = 53;
?>

InterruptType InterruptTable[<?=$MAX_INT_COUNT;?>] =
{
<?php
$intnames = $config->getList("/OSEK","ISR");
for ($loopi = 0; $loopi < $MAX_INT_COUNT; $loopi++)
{
   foreach($intnames as $int)
   {
      $inttype = $config->getValue("/OSEK/" . $int, "INTERRUPT");
      $intcat = $config->getValue("/OSEK/" . $int, "CATEGORY");

      if ((isset($intList[$loopi])) && ($inttype == $intList[$loopi]))
      {
         print "  /* " . $inttype . " interrupt handler (category " . $intcat . ") */\n";
         if($intcat == "1")
         {
            print "	OSEK_ISR_$int, /* interrupt handler $loopi */\n";
            $flag = true;
         }
         elseif($intcat == "2")
         {
            print "	OSEK_ISR2_$int, /* interrupt handler $loopi */\n";
            $flag = true;
         }
         else
         {
            error("Interrupt $int type $inttype has an invalid category $intcat");
         }
      }
   }
}
?>
}

/** @} doxygen end group definition */
/** @} doxygen end group definition */
/** @} doxygen end group definition */
/*==================[end of file]============================================*/

