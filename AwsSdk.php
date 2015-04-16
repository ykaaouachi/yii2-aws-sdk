<?php
/**
 * @copyright Federico Nicolás Motta
 * @author Federico Nicolás Motta <fedemotta@gmail.com>
 * @license http://opensource.org/licenses/mit-license.php The MIT License (MIT)
 * @package yii2-aws-sdk
 * @version 0.1
 */
namespace fedemotta\awssdk;
use yii\base\Component;
use Aws\Common\Aws;

/**
 * Yii2 component wrapping of the AWS SDK for easy configuration
 *
 * @author Federico Nicolás Motta <fedemotta@gmail.com>
 * @since 0.1
 */
class AwsSdk extends Component
{
    /*
     * @var string specifies the AWS key
     */
    public $key = null;
    
    /*
     * @var string specifies the AWS secret
     */
    public $secret = null;
    
    /**
     * @var AWS SDK instance
     */
    protected $_awssdk;
    
    /**
     * Initializes (if needed) and fetches the AWS SDK instance
     * @return Aws instance
     */
    public function getAwsSdk()
    {
        if (empty($this->_awssdk) || !$this->_awssdk instanceof Aws\Common\Aws) {
            $this->setAwsSdk();
        }
        return $this->_awssdk;
    }
    /**
     * Sets the AWS SDK instance
     */
    public function setAwsSdk()
    {
        $this->_awssdk = Aws::factory([$this->key,$this->secret]);
    }
}
