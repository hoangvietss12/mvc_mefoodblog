<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/rpc/error_details.proto

namespace Google\Rpc;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Describes the cause of the error with structured details.
 * Example of an error when contacting the "pubsub.googleapis.com" API when it
 * is not enabled:
 *     { "reason": "API_DISABLED"
 *       "domain": "googleapis.com"
 *       "metadata": {
 *         "resource": "projects/123",
 *         "service": "pubsub.googleapis.com"
 *       }
 *     }
 * This response indicates that the pubsub.googleapis.com API is not enabled.
 * Example of an error that is returned when attempting to create a Spanner
 * instance in a region that is out of stock:
 *     { "reason": "STOCKOUT"
 *       "domain": "spanner.googleapis.com",
 *       "metadata": {
 *         "availableRegions": "us-central1,us-east2"
 *       }
 *     }
 *
 * Generated from protobuf message <code>google.rpc.ErrorInfo</code>
 */
class ErrorInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * The reason of the error. This is a constant value that identifies the
     * proximate cause of the error. Error reasons are unique within a particular
     * domain of errors. This should be at most 63 characters and match a
     * regular expression of `[A-Z][A-Z0-9_]+[A-Z0-9]`, which represents
     * UPPER_SNAKE_CASE.
     *
     * Generated from protobuf field <code>string reason = 1;</code>
     */
    protected $reason = '';
    /**
     * The logical grouping to which the "reason" belongs. The error domain
     * is typically the registered service name of the tool or product that
     * generates the error. Example: "pubsub.googleapis.com". If the error is
     * generated by some common infrastructure, the error domain must be a
     * globally unique value that identifies the infrastructure. For Google API
     * infrastructure, the error domain is "googleapis.com".
     *
     * Generated from protobuf field <code>string domain = 2;</code>
     */
    protected $domain = '';
    /**
     * Additional structured details about this error.
     * Keys should match /[a-zA-Z0-9-_]/ and be limited to 64 characters in
     * length. When identifying the current value of an exceeded limit, the units
     * should be contained in the key, not the value.  For example, rather than
     * {"instanceLimit": "100/request"}, should be returned as,
     * {"instanceLimitPerRequest": "100"}, if the client exceeds the number of
     * instances that can be created in a single (batch) request.
     *
     * Generated from protobuf field <code>map<string, string> metadata = 3;</code>
     */
    private $metadata;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $reason
     *           The reason of the error. This is a constant value that identifies the
     *           proximate cause of the error. Error reasons are unique within a particular
     *           domain of errors. This should be at most 63 characters and match a
     *           regular expression of `[A-Z][A-Z0-9_]+[A-Z0-9]`, which represents
     *           UPPER_SNAKE_CASE.
     *     @type string $domain
     *           The logical grouping to which the "reason" belongs. The error domain
     *           is typically the registered service name of the tool or product that
     *           generates the error. Example: "pubsub.googleapis.com". If the error is
     *           generated by some common infrastructure, the error domain must be a
     *           globally unique value that identifies the infrastructure. For Google API
     *           infrastructure, the error domain is "googleapis.com".
     *     @type array|\Google\Protobuf\Internal\MapField $metadata
     *           Additional structured details about this error.
     *           Keys should match /[a-zA-Z0-9-_]/ and be limited to 64 characters in
     *           length. When identifying the current value of an exceeded limit, the units
     *           should be contained in the key, not the value.  For example, rather than
     *           {"instanceLimit": "100/request"}, should be returned as,
     *           {"instanceLimitPerRequest": "100"}, if the client exceeds the number of
     *           instances that can be created in a single (batch) request.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Rpc\ErrorDetails::initOnce();
        parent::__construct($data);
    }

    /**
     * The reason of the error. This is a constant value that identifies the
     * proximate cause of the error. Error reasons are unique within a particular
     * domain of errors. This should be at most 63 characters and match a
     * regular expression of `[A-Z][A-Z0-9_]+[A-Z0-9]`, which represents
     * UPPER_SNAKE_CASE.
     *
     * Generated from protobuf field <code>string reason = 1;</code>
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * The reason of the error. This is a constant value that identifies the
     * proximate cause of the error. Error reasons are unique within a particular
     * domain of errors. This should be at most 63 characters and match a
     * regular expression of `[A-Z][A-Z0-9_]+[A-Z0-9]`, which represents
     * UPPER_SNAKE_CASE.
     *
     * Generated from protobuf field <code>string reason = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setReason($var)
    {
        GPBUtil::checkString($var, True);
        $this->reason = $var;

        return $this;
    }

    /**
     * The logical grouping to which the "reason" belongs. The error domain
     * is typically the registered service name of the tool or product that
     * generates the error. Example: "pubsub.googleapis.com". If the error is
     * generated by some common infrastructure, the error domain must be a
     * globally unique value that identifies the infrastructure. For Google API
     * infrastructure, the error domain is "googleapis.com".
     *
     * Generated from protobuf field <code>string domain = 2;</code>
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * The logical grouping to which the "reason" belongs. The error domain
     * is typically the registered service name of the tool or product that
     * generates the error. Example: "pubsub.googleapis.com". If the error is
     * generated by some common infrastructure, the error domain must be a
     * globally unique value that identifies the infrastructure. For Google API
     * infrastructure, the error domain is "googleapis.com".
     *
     * Generated from protobuf field <code>string domain = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setDomain($var)
    {
        GPBUtil::checkString($var, True);
        $this->domain = $var;

        return $this;
    }

    /**
     * Additional structured details about this error.
     * Keys should match /[a-zA-Z0-9-_]/ and be limited to 64 characters in
     * length. When identifying the current value of an exceeded limit, the units
     * should be contained in the key, not the value.  For example, rather than
     * {"instanceLimit": "100/request"}, should be returned as,
     * {"instanceLimitPerRequest": "100"}, if the client exceeds the number of
     * instances that can be created in a single (batch) request.
     *
     * Generated from protobuf field <code>map<string, string> metadata = 3;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * Additional structured details about this error.
     * Keys should match /[a-zA-Z0-9-_]/ and be limited to 64 characters in
     * length. When identifying the current value of an exceeded limit, the units
     * should be contained in the key, not the value.  For example, rather than
     * {"instanceLimit": "100/request"}, should be returned as,
     * {"instanceLimitPerRequest": "100"}, if the client exceeds the number of
     * instances that can be created in a single (batch) request.
     *
     * Generated from protobuf field <code>map<string, string> metadata = 3;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setMetadata($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->metadata = $arr;

        return $this;
    }

}

