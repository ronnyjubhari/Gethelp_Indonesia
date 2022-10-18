<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\IdentityToolkit;

class EmailTemplate extends \Google\Model
{
  public $body;
  public $format;
  public $from;
  public $fromDisplayName;
  public $replyTo;
  public $subject;

  public function setBody($body)
  {
    $this->body = $body;
  }
  public function getBody()
  {
    return $this->body;
  }
  public function setFormat($format)
  {
    $this->format = $format;
  }
  public function getFormat()
  {
    return $this->format;
  }
  public function setFrom($from)
  {
    $this->from = $from;
  }
  public function getFrom()
  {
    return $this->from;
  }
  public function setFromDisplayName($fromDisplayName)
  {
    $this->fromDisplayName = $fromDisplayName;
  }
  public function getFromDisplayName()
  {
    return $this->fromDisplayName;
  }
  public function setReplyTo($replyTo)
  {
    $this->replyTo = $replyTo;
  }
  public function getReplyTo()
  {
    return $this->replyTo;
  }
  public function setSubject($subject)
  {
    $this->subject = $subject;
  }
  public function getSubject()
  {
    return $this->subject;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EmailTemplate::class, 'Google_Service_IdentityToolkit_EmailTemplate');
